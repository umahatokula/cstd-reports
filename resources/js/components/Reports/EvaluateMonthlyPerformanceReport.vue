<template>
  <div>

    <div class="card">
      <div class="card-body">
        <p class="card-text">
          <table class="table">
      <tbody>
        <tr>
          <td>
            <b>From</b>
          </td>
          <td>{{ report.from }}</td>
          <td>
            <b>To</b>
          </td>
          <td>{{ report.to }}</td>
        </tr>
      </tbody>
    </table>
    <br>
    <h4>Appraisee</h4>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Appraisee</td>
          <td>{{ report.appraisee_record ? report.appraisee_record.full_name : '' }}</td>
        </tr>
        <tr>
          <td>File Number</td>
          <td>{{ report.appraisee_record ? report.appraisee_record.pf : ''}}</td>
        </tr>
        <tr>
          <td>Designation/Grade Level</td>
          <td>{{ report.grade_level ? report.grade_level.name : '' }}</td>
        </tr>
        <tr>
          <td>Department</td>
          <td>{{ report.department ? report.department.name : '' }}</td>
        </tr>
        <tr>
          <td>Division</td>
          <td>{{ report.division ? report.division.name : '' }}</td>
        </tr>
        <tr>
          <td>Unit</td>
          <td>{{ report.unit ? report.unit.name : '' }}</td>
        </tr>
      </tbody>
    </table>
    <br>
    <h4>Report</h4>
    <h5>
      <b>A.</b> Total number of days absent during period covered by the Report
    </h5>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Reasons</th>
          <th class="text-center">Permission</th>
          <th class="text-center">No of Days</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td scope="row">{{ absent_days[0].reason }}</td>
          <td class="text-center">{{ absent_days[0].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[0].no_of_days }}</td>
        </tr>
        <tr>
          <td scope="row">{{ absent_days[1].reason }}</td>
          <td class="text-center">{{ absent_days[1].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[1].no_of_days }}</td>
        </tr>
        <tr>
          <td scope="row">{{ absent_days[2].reason }}</td>
          <td class="text-center">{{ absent_days[2].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[2].no_of_days }}</td>
        </tr>
        <tr>
          <td scope="row">{{ absent_days[3].reason }}</td>
          <td class="text-center">{{ absent_days[3].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[3].no_of_days }}</td>
        </tr>
        <tr>
          <td scope="row">{{ absent_days[4].reason }}</td>
          <td class="text-center">{{ absent_days[4].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[4].no_of_days }}</td>
        </tr>
        <tr>
          <td scope="row">{{ absent_days[5].reason }}</td>
          <td class="text-center">{{ absent_days[5].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[5].no_of_days }}</td>
        </tr>
        <tr>
          <td scope="row">{{ absent_days[6].reason }}</td>
          <td class="text-center">{{ absent_days[6].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[6].no_of_days }}</td>
        </tr>
        <tr>
          <td scope="row">{{ absent_days[7].reason }}</td>
          <td class="text-center">{{ absent_days[7].permission ? 'Yes' : 'No' }}</td>
          <td class="text-center">{{ absent_days[7].no_of_days }}</td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5>
      <b>B.</b> Target set for my Division/Unit
    </h5>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Target</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(target, index) in report.division_targets" :key="index">
          <td scope="row">
            <span v-if="target">{{ target.target }}</span>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5>
      <b>C.</b> Target set for Appraisee
    </h5>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Target</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(target, index) in report.appraisee_targets" :key="index">
          <td scope="row">{{ target.target }}</td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5>
      <b>D.</b> Achievement of Targets
    </h5>
    <small>Which of these targets were you able to achieve and why?</small>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Achieved Target</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(target, index) in report.targets_achieved" :key="index">
          <td scope="row">{{ target.achieved }}</td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5>
      <b>E.</b> Reporting Officer Comment
    </h5>
    <p>{{ report.comment }}</p>

        </p>
      </div>
    </div>
    
    <div class="card">
      <div class="card-body">
        <p class="card-text">
          <h5 class="text-danger text-center">Division/Unit Head's Evaluation</h5>
    <div class="form-group row">
      <h5>
        <b>F.</b> Division/ Unit Head's Comment Only
      </h5>
      <div class="col-sm-12 table-responsive">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>i</td>
              <td>Rate punctuality of Appraisee in (%)</td>
              <td>
                <select v-model="report.punctuality" class="form-control" :disabled="!can_evaluate">
                  <option
                    v-for="(option, index) in ratingsOptions"
                    v-bind:value="option.value"
                    :key="index"
                  >{{ option.name }}</option>
                </select>
                <small v-if="errors.punctuality" class="text-danger">{{ errors.punctuality[0] }}</small>
              </td>
            </tr>
            <tr>
              <td>ii</td>
              <td>Rate availability of Appraisee in (%)</td>
              <td>
                <select v-model="report.availability" class="form-control" :disabled="!can_evaluate">
                  <option
                    v-for="(option, index) in ratingsOptions"
                    v-bind:value="option.value"
                    :key="index"
                  >{{ option.name }}</option>
                </select>
                <small v-if="errors.availability" class="text-danger">{{ errors.availability[0] }}</small>
              </td>
            </tr>
            <tr>
              <td>iii</td>
              <td>Rate general conduct of Appraisee in (%)</td>
              <td>
                <select v-model="report.general_conduct" class="form-control" :disabled="!can_evaluate">
                  <option
                    v-for="(option, index) in ratingsOptions"
                    v-bind:value="option.value"
                    :key="index"
                  >{{ option.name }}</option>
                </select>
                <small
                  v-if="errors.general_conduct"
                  class="text-danger"
                >{{ errors.general_conduct[0] }}</small>
              </td>
            </tr>
            <tr>
              <td>iv</td>
              <td>How do you comment on interpersonaland intellectual skills of Appraisee</td>
              <td>
                <textarea
                  v-model="report.interpersonal_intellectual"
                  :disabled="!can_evaluate"
                  class="form-control"
                  cols="30"
                  rows="5"
                ></textarea>
                <small
                  v-if="errors.interpersonal_intellectual"
                  class="text-danger"
                >{{ errors.interpersonal_intellectual[0] }}</small>
              </td>
            </tr>
            <tr>
              <td>v</td>
              <td>Suggestion/Recommendation about what the management can do to improve the officer's productivity</td>
              <td>
                <textarea
                  :disabled="!can_evaluate"
                  v-model="report.recommendation"
                  class="form-control"
                  cols="30"
                  rows="5"
                ></textarea>
                <small
                  v-if="errors.recommendation"
                  class="text-danger"
                >{{ errors.recommendation[0] }}</small>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="form-group row">
      <h5>
        <b>G.</b> General Remark by Divisional/Unit Heads
      </h5>
      <div class="col-sm-12">
        <textarea
          v-model="report.general_remark"
          :disabled="!can_evaluate"
          class="form-control"
          cols="30"
          rows="8"
        ></textarea>
        <small v-if="errors.general_remark" class="text-danger">{{ errors.general_remark[0] }}</small>
      </div>
    </div>
    <hr>
    <form method="POST" v-if="!savedSuccessfully">
      <div class="form-group row">
        <div class="col-sm-10 text-center">
          <button
            v-if="user.user.roles[0].slug == 'unithead'"
            @click.prevent="evaluate"
            type="submit"
            class="btn btn-primary"
          >Evaluate</button>
          <button
            v-if="user.user.roles[0].slug == 'headofdiv'"
            @click.prevent="counterSign"
            type="submit"
            class="btn btn-warning"
          >Counter Sign</button>
        </div>
      </div>
    </form>
        </p>
      </div>
    </div>

    <div class="card border-success mb-3" v-if="savedSuccessfully">
      <div class="card-body text-success text-center">
        <p class="card-text">Report was successfully edited.</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "EvaluateMonthlyPerformanceReport",
  props: {
    user: {
      required: true
      // type: Object
    },
    report_id: {
      required: true,
      type: Number
    }
  },
  data() {
    return {
      errors: [],
      savedSuccessfully: false,
      staffs: "",
      report: "",
      appraisee: null,
      permissionOptions: [
        {
          value: 0,
          name: "No"
        },
        {
          value: 1,
          name: "Yes"
        }
      ],
      ratingsOptions: [
        {
          value: "10",
          name: "10%"
        },
        {
          value: "20",
          name: "20%"
        },
        {
          value: "30",
          name: "30%"
        },
        {
          value: "40",
          name: "40%"
        },
        {
          value: "50",
          name: "50%"
        },
        {
          value: "60",
          name: "60%"
        },
        {
          value: "70",
          name: "70%"
        },
        {
          value: "80-100",
          name: "80%-100%%"
        }
      ],
      absent_days: [
        {
          annual_permission: 0,
          annual_days: 0
        },
        {
          sick_permission: 0,
          sick_days: 0
        },
        {
          compassionate_permission: 0,
          compassionate_days: 0
        },
        {
          casual_permission: 0,
          casual_days: 0
        },
        {
          study_permission: 0,
          study_days: 0
        },
        {
          official_permission: 0,
          official_days: 0
        },
        {
          maternity_permission: 0,
          maternity_days: 0
        },
        {
          exam_permission: 0,
          exam_days: 0
        }
      ],
      division_targets: [
        {
          target: ""
        }
      ],
      appraisee_targets: [
        {
          target: ""
        }
      ],
      achievedTargets: [
        {
          achieved: ""
        }
      ],
      unachievedTargets: [
        {
          achieved: ""
        }
      ]
    };
  },
  computed: {
    appraisee_unit() {
      return this.appraisee.unit.name;
    },
    appraisee_division() {
      return this.appraisee.unit.division.name;
    },
    appraisee_department() {
      return this.appraisee.unit.division.department.name;
    }
  },
  computed: {
    can_evaluate: function() {
      if (this.user.user.roles[0].slug == 'headofdiv' || this.user.user.roles[0].slug == 'unithead') {
        return true;
      } else {
        return false;
      }      
    }
  },
  methods: {
    addDivisionTarget() {
      this.division_targets.push({
        target: ""
      });
    },
    removeDivisionTarget(index) {
      this.division_targets.splice(index, 1);
    },
    addAppraiseeTarget() {
      this.appraisee_targets.push({
        target: ""
      });
    },
    removeAppraiseeTarget(index) {
      this.appraisee_targets.splice(index, 1);
    },
    addAchievedTarget() {
      this.achievedTargets.push({
        achieved: ""
      });
    },
    removeAchievedTarget(index) {
      this.achievedTargets.splice(index, 1);
    },
    addUnachievedTarget() {
      this.unachievedTargets.push({
        achieved: ""
      });
    },
    removeUnachievedTarget(index) {
      this.unachievedTargets.splice(index, 1);
    },
    counterSign: function() {
      confirm = confirm("Are you sure? This action is irriversible.");
      if (!confirm) {
        console.log("Cancelled");
        return;
      }
      const formData = {
        is_counter_signed: 1
      };

      axios
        .post(`reports/${this.report_id}/counterSign`, formData)
        .then(res => {
          //   console.log(res);
          //   this.savedSuccessfully = true;
          var getUrl = window.location;
          var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1];
          window.location.href = baseUrl + "/public/reports";
        })
        .catch(e => {
          console.log(e.response.data.message);

          if (e.response.status == 422) {
            this.errors = e.response.data.errors;
          }
          this.$toasted.error(e.response.data.message);
        });
    },
    evaluate: function() {
      this.errors = [];

      if (!this.appraisee) {
        alert("Select an appraisee");
        return;
      }

      const formData = {
        punctuality: this.report.punctuality,
        availability: this.report.availability,
        general_conduct: this.report.general_conduct,
        interpersonal_intellectual: this.report.interpersonal_intellectual,
        recommendation: this.report.recommendation,
        general_remark: this.report.general_remark,
        appraisee_id: this.appraisee.id,
        reporting_offcer_id: this.appraisee.id
      };
      //   console.log(data)
      axios
        .put(`reports/${this.report_id}/storeEvaluation`, formData)
        .then(res => {
          // console.log(res);
          //   this.savedSuccessfully = true;
          var getUrl = window.location;
          var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1];
          window.location.href = baseUrl + "/public/reports";
        })
        .catch(e => {
          console.log(e.response.data.message);
          if (e.response.status == 422) {
            this.errors = e.response.data.errors;
          }
          this.$toasted.error(e.response.data.message);
        });
    },
    getData() {
      axios.get(`staff`).then(res => {
        this.staffs = res.data;
      });

      axios.get(`reports/${this.report_id}/evaluate`).then(res => {
        // console.log(res.data);
        this.appraisee = this.staffs.find(s => {
          return s.id == res.data.appraisee;
        });
        this.report = res.data;
        this.division_targets = res.data.division_targets;
        this.appraisee_targets = res.data.appraisee_targets;
        this.achievedTargets = res.data.targets_achieved;
        this.unachievedTargets = res.data.targets_unachieved;
        this.report.officer_comment = res.data.comment;
        this.absent_days[0].reason = res.data.absent_days[0].reason;
        this.absent_days[0].no_of_days = res.data.absent_days[0].no_of_days;
        this.absent_days[0].annual_permission =
          res.data.absent_days[0].permission;

        this.absent_days[1].reason = res.data.absent_days[1].reason;
        this.absent_days[1].no_of_days = res.data.absent_days[1].no_of_days;
        this.absent_days[1].sick_permission =
          res.data.absent_days[1].permission;

        this.absent_days[2].reason = res.data.absent_days[2].reason;
        this.absent_days[2].no_of_days = res.data.absent_days[2].no_of_days;
        this.absent_days[2].compassionate_permission =
          res.data.absent_days[2].permission;

        this.absent_days[3].reason = res.data.absent_days[3].reason;
        this.absent_days[3].no_of_days = res.data.absent_days[3].no_of_days;
        this.absent_days[3].casual_permission =
          res.data.absent_days[3].permission;

        this.absent_days[4].reason = res.data.absent_days[4].reason;
        this.absent_days[4].no_of_days = res.data.absent_days[4].no_of_days;
        this.absent_days[4].study_permission =
          res.data.absent_days[4].permission;

        this.absent_days[5].reason = res.data.absent_days[5].reason;
        this.absent_days[5].no_of_days = res.data.absent_days[5].no_of_days;
        this.absent_days[5].official_permission =
          res.data.absent_days[5].permission;

        this.absent_days[6].reason = res.data.absent_days[6].reason;
        this.absent_days[6].no_of_days = res.data.absent_days[6].no_of_days;
        this.absent_days[6].maternity_permission =
          res.data.absent_days[6].permission;

        this.absent_days[7].reason = res.data.absent_days[7].reason;
        this.absent_days[7].no_of_days = res.data.absent_days[7].no_of_days;
        this.absent_days[7].exam_permission =
          res.data.absent_days[7].permission;
      });
    }
  },
  created() {
    this.getData();
  }
};
</script>

<style>
</style>
