<template>
  <div>
    <hr>

    <h5>7. Training Course/Seminars/Attended since Appointment</h5>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="text-left">Type of Training/Seminar</th>
            <th>Where the Traingin was held</th>
            <th>From</th>
            <th>To</th>
            <th class="text-center">
              <div @click="addTraining" class="btn btn-primary btn-sm">Add</div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(training, index) in trainings" :key="index">
            <td scope="row">
              <input v-model="training.training" type="text" class="form-control" required>
            </td>
            <td scope="row">
              <input v-model="training.location" type="text" class="form-control" required>
            </td>
            <td scope="row">
              <input v-model="training.from" type="date" class="form-control" required>
            </td>
            <td scope="row">
              <input v-model="training.to" type="date" class="form-control" required>
            </td>
            <td class="text-center">
              <div @click="removeTraining(index)" class="btn btn-danger btn-sm">Remove</div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <small v-if="errors.trainings" class="text-danger">{{ errors.trainings[0] }}</small>

    <p>Has the past trainings recieved by you enhanced your performance and productivity?</p>
    <input v-model="report.training_enhanced_productivity" type="text" class="form-control">
    <small
      v-if="errors.training_enhanced_productivity"
      class="text-danger"
    >{{ errors.training_enhanced_productivity[0] }}</small>
    <br>

    <h5>Job Performance - Comment on duties performance during the period of this report</h5>
    <p>(a) Looking back on the last year,which jobs assigned to you do you think you have undertaken satisfactorily in relation to the tasks/main duties performed during the period of report?</p>
    <input v-model="report.satisfactory_tasks" type="text" class="form-control">
    <small v-if="errors.satisfactory_tasks" class="text-danger">{{ errors.satisfactory_tasks[0] }}</small>
    <br>

    <p>(b) What were the causes personal or otherwise, to which you ascribe your success or failure?</p>
    <input v-model="report.causes_success_failure" type="text" class="form-control">
    <small
      v-if="errors.causes_success_failure"
      class="text-danger"
    >{{ errors.causes_success_failure[0] }}</small>
    <br>

    <p>(c) Do you think that you need more training or experience to enable you do your job better? If so of what kind?</p>
    <input v-model="report.more_training" type="text" class="form-control">
    <small v-if="errors.more_training" class="text-danger">{{ errors.more_training[0] }}</small>
    <br>

    <p>(d) Is the most effective use being made of your capabilities in your present job?</p>
    <input v-model="report.most_effective_use" type="text" class="form-control">
    <small v-if="errors.most_effective_use" class="text-danger">{{ errors.most_effective_use[0] }}</small>
    <br>

    <p>(e) Do you think that your abilities could be better used in your present job or in another kind of job?</p>
    <input v-model="report.abilities_better_used" type="text" class="form-control">
    <small
      v-if="errors.abilities_better_used"
      class="text-danger"
    >{{ errors.abilities_better_used[0] }}</small>
    <br>

    <p>(f) During the period of this report did you have job satisfaction, if not, what were the causes?</p>
    <input v-model="report.had_job_satisfaction" type="text" class="form-control">
    <small
      v-if="errors.had_job_satisfaction"
      class="text-danger"
    >{{ errors.had_job_satisfaction[0] }}</small>
    <br>

    <p>(g) Any other comments on issues not mentioned above?</p>
    <textarea v-model="report.other_comments" type="text" class="form-control"></textarea>
    <small v-if="errors.other_comments" class="text-danger">{{ errors.other_comments[0] }}</small>

    <hr>
    <p>
      <input type="checkbox" v-model="report.is_submitted" value="1">
      <b>By checking this box, your report will be made available to the countersigning officer for evaluation and you will no longer be able to edit it.</b>
    </p>

    <hr>
    <div class="row text-center">
      <div class="col-md-12">
        <button @click="saveAndQuit" class="btn btn-success btn-sm">Save Trainings & Quit</button>
        <button @click="saveAndPreview" class="btn btn-warning btn-sm">Save Traingings & Preview</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Trainings",
  props: {
    staff_id: {
      required: true
    },
    currentTab: {
      required: true
    }
  },
  data() {
    return {
      report: {
        staff_id: null,
        training_enhanced_productivity: null,
        satisfactory_tasks: null,
        causes_success_failure: null,
        more_training: null,
        most_effective_use: null,
        abilities_better_used: null,
        had_job_satisfaction: null,
        other_comments: null,
        is_submitted: 0
      },
      errors: [],
      staffs: [],
      trainings: [
        {
          training: "",
          location: "",
          from: "",
          to: ""
        }
      ]
    };
  },
  methods: {
    addTraining() {
      this.trainings.push({
        training: "",
        location: "",
        from: "",
        to: ""
      });
    },

    removeTraining(index) {
      this.trainings.splice(index, 1);
    },

    saveAndQuit() {
      this.report.staff_id = this.staff_id;
      this.report.year = new Date().getFullYear();
      this.report.trainings = this.trainings;

      //   console.log(this.report);

      axios
        .post(`aper-forms/store/trainings`, this.report)
        .then(res => {
          console.log(res.data);
          var getUrl = window.location;
          var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1];
          window.location.href = baseUrl + "/public/aper-forms";
        })
        .catch(e => {
          //   console.log(e);
          if (e.response.status == 422) {
            this.errors = e.response.data.errors;
            Vue.toasted.error("NOTE: All fields are required.");
          }
        });
    },

    saveAndPreview() {
      this.report.staff_id = this.staff_id;
      this.report.year = new Date().getFullYear();
      this.report.trainings = this.trainings;

      axios
        .post(`aper-forms/store/trainings`, this.report)
        .then(res => {
          var getUrl = window.location;
          var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1];
          window.location.href = `${baseUrl}/public/aper-forms/${
            res.data.report.id
          }/preview`;
        })
        .catch(e => {
          console.log(e);
          if (e.response.status == 422) {
            this.errors = e.response.data.errors;
            Vue.toasted.error("NOTE: All fields are required.");
          }
        });
    },

    getData() {
      axios
        .get(`aper-forms/create`)
        .then(res => {
          //   console.log(res.data);
          this.staffs = res.data.staffs;
          if (res.data.report) {
            this.trainings = res.data.report.trainings;
            this.report = res.data.report;

            // emit to set current form page
            // this.$emit("record-saved", {
            //     nextForm: res.data.report.current_form_page
            // });
          }
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  created() {
    console.log("Trainings Component Loaded.");
    this.report.current_form_page = this.currentTab;
    this.report.staff_id = this.staff_id;
    this.getData();
  }
};
</script>

<style>
</style>
