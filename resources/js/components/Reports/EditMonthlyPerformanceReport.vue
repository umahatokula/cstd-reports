<template>
  <div>
    <form method="POST" v-if="!savedSuccessfully">
      <fieldset>
        <legend>Reporting Period</legend>
        <div class="form-group row">
          <div for="staff" class="col-md-3">From</div>
          <div class="col-md-3">
            <input type="date" class="form-control" v-model="report.from">
            <small v-if="errors.from" class="text-danger">{{ errors.from[0] }}</small>
          </div>
          <div for="staff" class="col-md-3">To</div>
          <div class="col-md-3">
            <input type="date" class="form-control" v-model="report.to">
            <small v-if="errors.to" class="text-danger">{{ errors.to[0] }}</small>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>Reporting Staff</legend>
        <div class="form-group row">
          <label for="staff" class="col-sm-3 col-form-label">Name of Officer</label>
          <div class="col-sm-9">
            <select v-model="appraisee" class="form-control">
              <option
                v-for="(staff, index) in staffs"
                v-bind:value="staff"
                :key="index"
              >{{ staff.full_name }}</option>
            </select>
            <small v-if="errors.appraisee" class="text-danger">{{ errors.appraisee[0] }}</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="grade_level_id" class="col-sm-3 col-form-label">Designation/Grade Level</label>
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="grade_level_id"
              placeholder="Designation/Grade Level"
              disabled
              v-if="appraisee"
              v-model="appraisee.grade_level.name"
            >
          </div>
        </div>
        <div class="form-group row">
          <label for="staff_pf" class="col-sm-3 col-form-label">File Number</label>
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="staff_pf"
              placeholder="File Number"
              disabled
              v-if="appraisee"
              v-model="appraisee.pf"
            >
          </div>
        </div>
        <div class="form-group row">
          <label for="department" class="col-sm-3 col-form-label">Department</label>
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="department"
              placeholder="Department"
              disabled
              v-if="appraisee"
              v-model="appraisee_department"
            >
          </div>
        </div>
        <div class="form-group row">
          <label for="division" class="col-sm-3 col-form-label">Division</label>
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="division"
              placeholder="Division"
              disabled
              v-if="appraisee"
              v-model="appraisee_division"
            >
          </div>
        </div>
        <div class="form-group row">
          <label for="unit" class="col-sm-3 col-form-label">Unit</label>
          <div class="col-sm-9">
            <input
              type="text"
              class="form-control"
              id="unit"
              placeholder="Unit"
              disabled
              v-if="appraisee"
              v-model="appraisee_unit"
            >
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>Report</legend>

        <div class="form-group row">
          <label for="unit" class="col-sm-12 col-form-label">
            <b>A.</b> Total number of days absent during period covered by the Report
          </label>
          <div class="col-sm-12">
            <small v-if="errors.absentDays" class="text-danger">{{ errors.absentDays[0] }}</small>
            <table class="table">
              <thead>
                <tr>
                  <th>Reasons</th>
                  <th>Permission</th>
                  <th>No of Days</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">Annual Leave</td>
                  <td>
                    <select v-model="absentDays[0].annual_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" v-model="absentDays[0].annual_days">
                  </td>
                </tr>
                <tr>
                  <td scope="row">Sick Leave</td>
                  <td>
                    <select v-model="absentDays[1].sick_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" v-model="absentDays[1].sick_days">
                  </td>
                </tr>
                <tr>
                  <td scope="row">Compassionate Leave</td>
                  <td>
                    <select v-model="absentDays[2].compassionate_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input
                      type="number"
                      class="form-control"
                      v-model="absentDays[2].compassionate_days"
                    >
                  </td>
                </tr>
                <tr>
                  <td scope="row">Casual Leave</td>
                  <td>
                    <select v-model="absentDays[3].casual_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" v-model="absentDays[3].casual_days">
                  </td>
                </tr>
                <tr>
                  <td scope="row">Study Leave</td>
                  <td>
                    <select v-model="absentDays[4].study_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" v-model="absentDays[4].study_days">
                  </td>
                </tr>
                <tr>
                  <td scope="row">Official Assignment</td>
                  <td>
                    <select v-model="absentDays[5].official_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" v-model="absentDays[5].official_days">
                  </td>
                </tr>
                <tr>
                  <td scope="row">Maternity Leave</td>
                  <td>
                    <select v-model="absentDays[6].maternity_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input
                      type="number"
                      class="form-control"
                      v-model="absentDays[6].maternity_days"
                    >
                  </td>
                </tr>
                <tr>
                  <td scope="row">Examination Leave/Others</td>
                  <td>
                    <select v-model="absentDays[7].exam_permission" class="form-control">
                      <option
                        v-for="(option, index) in permissionOptions"
                        v-bind:value="option.value"
                        :key="index"
                      >{{ option.name }}</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" v-model="absentDays[7].exam_days">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group row">
          <p for="unit" class="col-sm-12 col-form-label">
            <b>B.</b> Target set for my Division/Unit
          </p>
          <div class="col-sm-12">
            <small v-if="errors.divisionTargets" class="text-danger">{{ errors.divisionTargets[0] }}</small>
            <table class="table">
              <thead>
                <tr>
                  <th>Target</th>
                  <th class="text-center">
                    <button @click.prevent="addDivisionTarget" class="btn btn-xs btn-info">
                      <small>add</small>
                    </button>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(target, index)  in divisionTargets" :key="target.id">
                  <td scope="row">
                    <input v-model="divisionTargets[index].target" class="form-control" required>
                  </td>
                  <td class="text-center">
                    <button
                      @click.prevent="removeDivisionTarget(index)"
                      class="btn btn-xs btn-danger"
                    >
                      <small>remove</small>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group row">
          <p for="unit" class="col-sm-12 col-form-label">
            <b>C.</b> Target set for Appraisee
          </p>
          <div class="col-sm-12">
            <small
              v-if="errors.appraiseeTargets"
              class="text-danger"
            >{{ errors.appraiseeTargets[0] }}</small>
            <table class="table">
              <thead>
                <tr>
                  <th>Target</th>
                  <th class="text-center">
                    <button @click.prevent="addAppraiseeTarget" class="btn btn-xs btn-info">
                      <small>add</small>
                    </button>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(target, index)  in appraiseeTargets" :key="target.id">
                  <td scope="row">
                    <input v-model="appraiseeTargets[index].target" class="form-control" required>
                  </td>
                  <td class="text-center">
                    <button
                      @click.prevent="removeAppraiseeTarget(index)"
                      class="btn btn-xs btn-danger"
                    >
                      <small>remove</small>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group row">
          <p for="unit" class="col-sm-12 col-form-label">
            <b>D.</b> Achievement of Targets
            <br>
            <small>Which of these targets were you able to achieve and why?</small>
          </p>
          <div class="col-sm-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Achieved Target</th>
                  <th class="text-center">
                    <button @click.prevent="addAchievedTarget" class="btn btn-xs btn-info">
                      <small>add</small>
                    </button>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(achieved, index)  in achievedTargets" :key="achieved.id">
                  <td scope="row">
                    <input v-model="achievedTargets[index].achieved" class="form-control" required>
                  </td>
                  <td class="text-center">
                    <button
                      @click.prevent="removeAchievedTarget(index)"
                      class="btn btn-xs btn-danger"
                    >
                      <small>remove</small>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <p for="unit" class="col-sm-12 col-form-label">
            <small>
              Which of these targets were you
              <b>NOT</b> able to achieve and why?
            </small>
          </p>
          <div class="col-sm-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Unachieved Target</th>
                  <th class="text-center">
                    <button @click.prevent="addUnachievedTarget" class="btn btn-xs btn-info">
                      <small>add</small>
                    </button>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(unachieved, index)  in unachievedTargets" :key="unachieved.id">
                  <td scope="row">
                    <input
                      v-model="unachievedTargets[index].unachieved"
                      class="form-control"
                      required
                    >
                  </td>
                  <td class="text-center">
                    <button
                      @click.prevent="removeUnachievedTarget(index)"
                      class="btn btn-xs btn-danger"
                    >
                      <small>remove</small>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group row">
          <p for="unit" class="col-sm-12 col-form-label">
            <b>E.</b> Reporting Officer Comment
          </p>
          <div class="col-sm-12">
            <textarea v-model="report.officer_comment" class="form-control"></textarea>
            <small v-if="errors.officer_comment" class="text-danger">{{ errors.officer_comment[0] }}</small>
          </div>
        </div>

      </fieldset>
      <hr>
      <div class="form-group row">
        <div class="col-sm-10 text-center">
          <button @click.prevent="submitForm" type="submit" class="btn btn-primary">Edit Report</button>
        </div>
      </div>
    </form>

    <div class="card border-success mb-3" v-if="savedSuccessfully">
      <div class="card-body text-success text-center">
        <p class="card-text">Report was successfully edited.</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "EditMonthlyPerformanceReport",
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
      absentDays: [
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
      divisionTargets: [
        {
          target: ""
        }
      ],
      appraiseeTargets: [
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
  methods: {
    addDivisionTarget() {
      this.divisionTargets.push({
        target: ""
      });
    },
    removeDivisionTarget(index) {
      this.divisionTargets.splice(index, 1);
    },
    addAppraiseeTarget() {
      this.appraiseeTargets.push({
        target: ""
      });
    },
    removeAppraiseeTarget(index) {
      this.appraiseeTargets.splice(index, 1);
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
    submitForm: function() {
      this.errors = [];

      if (!this.appraisee) {
        alert("Select an appraisee");
        return;
      }

      const formData = {
        from: this.report.from,
        to: this.report.to,
        absentDays: this.absentDays,
        divisionTargets: this.divisionTargets,
        appraiseeTargets: this.appraiseeTargets,
        achievedTargets: this.achievedTargets,
        unachievedTargets: this.unachievedTargets,
        officer_comment: this.report.officer_comment,
        punctuality: this.report.punctuality,
        availability: this.report.availability,
        general_conduct: this.report.general_conduct,
        interpersonal_intellectual: this.report.interpersonal_intellectual,
        recommendation: this.report.recommendation,
        general_remark: this.report.general_remark,
        appraisee_id: this.appraisee.id,
        reporting_offcer_id: this.user.id
      };
      //   console.log(data)
      //   axios.post(`admin/leaves`, formData);
      axios
        .put(`reports/${this.report_id}`, formData)
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
          //   console.log(e);
          if (e.response.status == 422) {
            this.errors = e.response.data.errors;
          }
        });
    },
    getData() {
      axios.get(`staff`).then(res => {
        this.staffs = res.data;
      });

      axios.get(`reports/${this.report_id}`).then(res => {
        // console.log(res.data.absent_days);
        this.appraisee = this.staffs.find(s => {
          return s.id == res.data.appraisee;
        });
        this.report = res.data;
        this.divisionTargets = res.data.division_targets;
        this.appraiseeTargets = res.data.appraisee_targets;
        this.achievedTargets = res.data.targets_achieved;
        this.unachievedTargets = res.data.targets_unachieved;
        this.report.officer_comment = res.data.comment;
        this.absentDays[0].annual_days = res.data.absent_days[0].no_of_days;
        this.absentDays[0].annual_permission =
          res.data.absent_days[0].permission;
        this.absentDays[1].sick_days = res.data.absent_days[1].no_of_days;
        this.absentDays[1].sick_permission = res.data.absent_days[1].permission;
        this.absentDays[2].compassionate_days =
          res.data.absent_days[2].no_of_days;
        this.absentDays[2].compassionate_permission =
          res.data.absent_days[2].permission;
        this.absentDays[3].casual_days = res.data.absent_days[3].no_of_days;
        this.absentDays[3].casual_permission =
          res.data.absent_days[3].permission;
        this.absentDays[4].study_days = res.data.absent_days[4].no_of_days;
        this.absentDays[4].study_permission =
          res.data.absent_days[4].permission;
        this.absentDays[5].official_days = res.data.absent_days[5].no_of_days;
        this.absentDays[5].official_permission =
          res.data.absent_days[5].permission;
        this.absentDays[6].maternity_days = res.data.absent_days[6].no_of_days;
        this.absentDays[6].maternity_permission =
          res.data.absent_days[6].permission;
        this.absentDays[7].exam_days = res.data.absent_days[7].no_of_days;
        this.absentDays[7].exam_permission = res.data.absent_days[7].permission;
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
