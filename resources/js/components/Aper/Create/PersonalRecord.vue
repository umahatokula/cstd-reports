<template>
  <div>
    <fieldset>
      <h5>Reporting Period</h5>
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
    <hr>
    <h4>PART I</h4>
    <fieldset>
      <h5>1. Reporting Staff</h5>
      <div class="form-group row">
        <label for="staff" class="col-sm-3 col-form-label">Name of Officer</label>
        <div class="col-sm-9">
          <select v-model="report.staff_id" class="form-control" disabled>
            <option
              v-for="(staff, index) in staffs"
              v-bind:value="staff.id"
              :key="index"
            >{{ staff.full_name }}</option>
          </select>
          <small v-if="errors.staff_id" class="text-danger">{{ errors.staff_id[0] }}</small>
        </div>
      </div>

      <h5>2. Ministry/Extra-Ministrial Department</h5>
      <div class="form-group row">
        <label for="grade_level_id" class="col-sm-3 col-form-label">Department</label>
        <div class="col-sm-9">
          <select v-model="report.department_id" class="form-control">
            <option
              v-for="(department, index) in departments"
              v-bind:value="department.id"
              :key="index"
            >{{ department.name }}</option>
          </select>
          <small v-if="errors.department_id" class="text-danger">{{ errors.department_id[0] }}</small>
        </div>
      </div>
      <div class="form-group row">
        <label for="staff_pf" class="col-sm-3 col-form-label">Division</label>
        <div class="col-sm-9">
          <select v-model="report.division_id" class="form-control">
            <option
              v-for="(division, index) in divisions"
              v-bind:value="division.id"
              :key="index"
            >{{ division.name }}</option>
          </select>
          <small v-if="errors.division_id" class="text-danger">{{ errors.division_id[0] }}</small>
        </div>
      </div>
      <div class="form-group row">
        <label for="department" class="col-sm-3 col-form-label">Branch</label>
        <div class="col-sm-9">
          <select v-model="report.unit_id" class="form-control">
            <option
              v-for="(unit, index) in units"
              v-bind:value="unit.id"
              :key="index"
            >{{ unit.name }}</option>
          </select>
          <small v-if="errors.unit_id" class="text-danger">{{ errors.unit_id[0] }}</small>
        </div>
      </div>
      <div class="form-group row">
        <label for="department" class="col-sm-3 col-form-label">Section</label>
        <div class="col-sm-9">
          <select v-model="report.section_id" class="form-control">
            <option
              v-for="(unit, index) in units"
              v-bind:value="unit.id"
              :key="index"
            >{{ unit.name }}</option>
          </select>
          <small v-if="errors.section_id" class="text-danger">{{ errors.section_id[0] }}</small>
        </div>
      </div>

      <h5>3. (A) Personal Particulars</h5>
      <div class="form-group row">
        <label for="grade_level_id" class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-3">
          <input v-model="report.dob" type="date" class="form-control">
          <small v-if="errors.dob" class="text-danger">{{ errors.dob[0] }}</small>
        </div>
        <label
          for="grade_level_id"
          class="col-sm-3 col-form-label"
        >Date Appointed to Substantive Post</label>
        <div class="col-sm-3">
          <input
            v-model="report.date_appointed_to_substantive_post"
            type="date"
            class="form-control"
          >
          <small
            v-if="errors.date_appointed_to_substantive_post"
            class="text-danger"
          >{{ errors.date_appointed_to_substantive_post[0] }}</small>
        </div>
      </div>

      <div class="form-group row">
        <label
          for="grade_level_id"
          class="col-sm-3 col-form-label"
        >Date of First Appointment in the service</label>
        <div class="col-sm-3">
          <input v-model="report.date_of_first_appointment" type="date" class="form-control">
          <small
            v-if="errors.date_of_first_appointment"
            class="text-danger"
          >{{ errors.date_of_first_appointment[0] }}</small>
        </div>
        <label for="grade_level_id" class="col-sm-3 col-form-label">Grade Level</label>
        <div class="col-sm-3">
          <select v-model="report.grade_level_id" class="form-control">
            <option
              v-for="(gradeLevel, index) in gradeLevels"
              v-bind:value="gradeLevel.id"
              :key="index"
            >{{ gradeLevel.name }}</option>
          </select>
          <small v-if="errors.grade_level_id" class="text-danger">{{ errors.grade_level_id[0] }}</small>
        </div>
      </div>

      <div class="form-group row">
        <label for="grade_level_id" class="col-sm-3 col-form-label">Post to which first Appointed</label>
        <div class="col-sm-3">
          <input v-model="report.post_first_appointed" type="text" class="form-control">
          <small
            v-if="errors.post_first_appointed"
            class="text-danger"
          >{{ errors.post_first_appointed[0] }}</small>
        </div>
        <label for="salary_per_annum" class="col-sm-3 col-form-label">Salary per Annum</label>
        <div class="col-sm-3">
          <input v-model="report.salary_per_annum" type="number" class="form-control">
          <small v-if="errors.salary_per_annum" class="text-danger">{{ errors.salary_per_annum[0] }}</small>
        </div>
      </div>

      <div class="form-group row">
        <label for="date_of_confirmation" class="col-sm-3 col-form-label">Date of Confirmation</label>
        <div class="col-sm-3">
          <input v-model="report.date_of_confirmation" type="date" class="form-control">
          <small
            v-if="errors.date_of_confirmation"
            class="text-danger"
          >{{ errors.date_of_confirmation[0] }}</small>
        </div>
        <label for="date_of_next_increment" class="col-sm-3 col-form-label">Date of next Increment</label>
        <div class="col-sm-3">
          <input v-model="report.date_of_next_increment" type="date" class="form-control">
          <small
            v-if="errors.date_of_next_increment"
            class="text-danger"
          >{{ errors.date_of_next_increment[0] }}</small>
        </div>
      </div>

      <div class="form-group row">
        <label
          for="present_substantive_post"
          class="col-sm-3 col-form-label"
        >Present Substantive Post</label>
        <div class="col-sm-3">
          <input v-model="report.present_substantive_post" type="text" class="form-control">
          <small
            v-if="errors.present_substantive_post"
            class="text-danger"
          >{{ errors.present_substantive_post[0] }}</small>
        </div>
        <label
          for="date_of_acting_appointment"
          class="col-sm-3 col-form-label"
        >Date of Acting Appointment durin the period covered by the Report</label>
        <div class="col-sm-3">
          <input v-model="report.date_of_acting_appointment" type="date" class="form-control">
          <small
            v-if="errors.date_of_acting_appointment"
            class="text-danger"
          >{{ errors.date_of_acting_appointment[0] }}</small>
        </div>
      </div>

      <h5>3. (B) Qualifications Held (Academic, Professional or Technical)</h5>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">Qualification</th>
              <th class="text-center">Year Obtained</th>
              <th class="text-center">
                <div @click="addqualification" class="btn btn-primary btn-sm">Add</div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(qualification, index) in qualifications" :key="index">
              <td scope="row">
                <input v-model="qualification.qualification_held" type="text" class="form-control">
              </td>
              <td>
                <input v-model="qualification.year_obtained" type="text" class="form-control">
              </td>
              <td class="text-center">
                <div @click="removequalification(index)" class="btn btn-danger btn-sm">Remove</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <h5>4. (A) Total number of days absent on sick leave during the period covered by the Report</h5>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>&nbsp</th>
              <th>&nbsp</th>
              <th>From</th>
              <th>To</th>
              <th>No of Days</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">i</td>
              <td>Hospitalisation</td>
              <td>
                <input v-model="report.hospital_leave_from" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.hospital_leave_to" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.hospital_leave_days" type="number" class="form-control">
              </td>
            </tr>

            <tr>
              <td scope="row">ii</td>
              <td>Treatment Recieved Abroad (where applicable)</td>
              <td>
                <input v-model="report.abroad_leave_from" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.abroad_leave_to" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.abroad_leave_days" type="number" class="form-control">
              </td>
            </tr>

            <tr>
              <td scope="row">iii</td>
              <td>Sick Leave</td>
              <td>
                <input v-model="report.sick_leave_from" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.sick_leave_to" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.sick_leave_days" type="number" class="form-control">
              </td>
            </tr>
            <tr>
              <td>
                <b>Total</b>
              </td>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">
                <input v-model="totalSickLeave" type="number" class="form-control" readonly>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <h5>4. (B) Maternity Leave</h5>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>&nbsp</th>
              <th>&nbsp</th>
              <th>From</th>
              <th>To</th>
              <th>No of Days</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">i</td>
              <td>Maternity Leave</td>
              <td>
                <input v-model="report.maternity_leave_from" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.maternity_leave_to" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.maternity_leave_days" type="number" class="form-control">
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <h5>4. (C) Annual & Casual Leave</h5>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>&nbsp</th>
              <th>&nbsp</th>
              <th>From</th>
              <th>To</th>
              <th>No of Days</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row">i</td>
              <td>Annual Leave</td>
              <td>
                <input v-model="report.annual_leave_from" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.annual_leave_to" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.annual_leave_days" type="number" class="form-control">
              </td>
            </tr>

            <tr>
              <td scope="row">ii</td>
              <td>Casual Leave</td>
              <td>
                <input v-model="report.casual_leave_from" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.casual_leave_to" type="date" class="form-control">
              </td>
              <td>
                <input v-model="report.casual_leave_days" type="number" class="form-control">
              </td>
            </tr>

            <tr>
              <td>
                <b>Total</b>
              </td>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">
                <input v-model="totalAnnualCasualLeave" type="number" class="form-control" readonly>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </fieldset>

    <hr>
    <div class="row text-center">
      <div class="col-md-12">
        <button
          @click="saveAndProceed"
          class="btn btn-success btn-sm"
        >Save Personal Information & Proceed</button>
        <button @click="quit" class="btn btn-danger btn-sm">Quit</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Personal",
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
        id: null,
        from: null,
        to: null,
        staff_id: null,
        department_id: null,
        division_id: null,
        unit_id: null,
        section_id: null,
        grade_level_id: null,
        hospital_leave_from: "",
        hospital_leave_to: "",
        hospital_leave_days: 0,
        abroad_leave_from: "",
        abroad_leave_to: "",
        abroad_leave_days: 0,
        sick_leave_from: "",
        sick_leave_to: "",
        sick_leave_days: 0,
        maternity_leave_from: "",
        maternity_leave_to: "",
        maternity_leave_days: 0,
        annual_leave_from: "",
        annual_leave_to: "",
        annual_leave_days: 0,
        casual_leave_from: "",
        casual_leave_to: "",
        casual_leave_days: 0
      },
      errors: [],
      staffs: [],
      departments: [],
      divisions: [],
      units: [],
      gradeLevels: [],
      qualifications: [
        {
          qualification_held: "",
          year_obtained: ""
        }
      ]
    };
  },
  computed: {
    totalSickLeave() {
      return (
        parseInt(this.report.hospital_leave_days, 10) +
        parseInt(this.report.abroad_leave_days, 10) +
        parseInt(this.report.sick_leave_days, 10)
      );
    },
    totalAnnualCasualLeave() {
      return (
        parseInt(this.report.annual_leave_days, 10) +
        parseInt(this.report.casual_leave_days, 10)
      );
    }
  },
  methods: {
    saveAndProceed() {
      this.report.staff_id = this.staff_id;
      this.report.year = new Date().getFullYear();
      this.report.qualifications = this.qualifications;

      axios
        .post(`aper-forms/store/personal`, this.report)
        .then(res => {
          //   console.log(res.data);
          this.$emit("record-saved", {
            nextForm: "targets"
          });
        })
        .catch(e => {
          //   console.log(e);
          if (e.response.status == 422) {
            this.errors = e.response.data.errors;
            Vue.toasted.error("NOTE: All fields are required.");
          }
        });
    },
    quit() {
      var getUrl = window.location;
      var baseUrl =
        getUrl.protocol +
        "//" +
        getUrl.host +
        "/" +
        getUrl.pathname.split("/")[1];
      window.location.href = baseUrl + "/public/aper-forms";
    },
    addqualification() {
      this.qualifications.push({
        qualification_held: "",
        year_obtained: ""
      });
    },
    removequalification(index) {
      this.qualifications.splice(index, 1);
    },
    getData() {
      axios
        .get(`aper-forms/create`)
        .then(res => {
          //   console.log(res.data);
          this.staffs = res.data.staffs;
          this.departments = res.data.departments;
          this.divisions = res.data.divisions;
          this.units = res.data.units;
          this.gradeLevels = res.data.gradeLevels;
          if (res.data.report) {
            this.qualifications = res.data.report.qualifications;
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
    console.log("Personal Records Component Loaded.");
    this.report.current_form_page = this.currentTab;
    this.report.staff_id = this.staff_id;
    this.getData();
  }
};
</script>

<style>
</style>
