<template>
  <div>
    <hr>
    <!-- {{report}} -->
    <div class="container">
      <br>
      <h6 class="text-primary">
        <b>1. Reporting Period</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>
                <b>From:</b>
              </td>
              <td>{{report.from}}</td>
              <td>
                <b>To:</b>
              </td>
              <td>{{report.to}}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>Reporting Staff</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>
                <b>Name:</b>
              </td>
              <td>
                <span v-if="report.staff">{{report.staff.full_name}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>PF:</b>
              </td>
              <td>
                <span v-if="report.staff">{{report.staff.pf}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>2. Ministry/Extra-Ministrial Department</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>
                <b>Department:</b>
              </td>
              <td>
                <span
                  v-if="report.staff.unit.division.department"
                >{{report.staff.unit.division.department.name}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Division:</b>
              </td>
              <td>
                <span v-if="report.staff.unit.division">{{report.staff.unit.division.name}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Branch:</b>
              </td>
              <td>
                <span v-if="report.staff.unit">{{report.staff.unit.name}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Section:</b>
              </td>
              <td>
                <span v-if="report.staff.unit">{{report.staff.unit.name}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>3. (A) Personal Particulars</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>
                <b>Date of Birth:</b>
              </td>
              <td>
                <span v-if="report">{{report.dob | moment("Do MMMM YYYY")}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Date Appointed to Substantive Post:</b>
              </td>
              <td>
                <span
                  v-if="report"
                >{{report.date_appointed_to_substantive_post | moment("Do MMMM YYYY")}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Date of First Appointment in the service:</b>
              </td>
              <td>
                <span v-if="report">{{report.date_of_first_appointment | moment("Do MMMM YYYY")}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Grade Level:</b>
              </td>
              <td>
                <span v-if="report.staff.grade_level">{{report.staff.grade_level.name}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Post to which first Appointed:</b>
              </td>
              <td>
                <span v-if="report">{{report.post_first_appointed}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Salary per Annum:</b>
              </td>
              <td>
                <span v-if="report">&#8358; {{report.salary_per_annum}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Date of Confirmation:</b>
              </td>
              <td>
                <span v-if="report">{{report.date_of_confirmation | moment("Do MMMM YYYY")}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Date of next Increment:</b>
              </td>
              <td>
                <span v-if="report">{{report.date_of_next_increment | moment("Do MMMM YYYY")}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Present Substantive Post:</b>
              </td>
              <td>
                <span v-if="report">{{report.present_substantive_post}}</span>
              </td>
            </tr>
            <tr>
              <td>
                <b>Date of Acting Appointment during the period covered by the Report:</b>
              </td>
              <td>
                <span v-if="report">{{report.date_of_acting_appointment | moment("Do MMMM YYYY")}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>3. (B) Qualifications Held (Academic, Professional or Technical)</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Qualification</th>
              <th>Year Obtained</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(qualification) in report.qualifications" :key="qualification.id">
              <td>{{ qualification.qualification_held }}</td>
              <td>
                <span v-if="report">{{qualification.year_obtained | moment("Do MMMM YYYY")}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>4. (A) Total number of days absent on sick leave during the period covered by the Report</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>&nbsp</th>
              <th>&nbsp</th>
              <th>From</th>
              <th>To</th>
              <th class="text-center">Number of Days</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>i</td>
              <td>Hospitalisation</td>
              <td>
                <span v-if="report">{{report.hospital_leave_from | moment("Do MMMM YYYY")}}</span>
              </td>
              <td>
                <span v-if="report">{{report.hospital_leave_to | moment("Do MMMM YYYY")}}</span>
              </td>
              <td class="text-center">
                <span v-if="report.staff">{{report.hospital_leave_days}}</span>
              </td>
            </tr>
            <tr>
              <td>ii</td>
              <td>Treatment Recieved Abroad (where applicable)</td>
              <td>
                <span v-if="report">{{report.abroad_treatment_leave_from | moment("Do MMMM YYYY")}}</span>
              </td>
              <td>
                <span v-if="report">{{report.abroad_treatment_leave_to | moment("Do MMMM YYYY")}}</span>
              </td>
              <td class="text-center">
                <span v-if="report.staff">{{report.abroad_leave_days}}</span>
              </td>
            </tr>
            <tr>
              <td>iii</td>
              <td>Sick Leave</td>
              <td>
                <span v-if="report">{{report.sick_leave_from | moment("Do MMMM YYYY")}}</span>
              </td>
              <td>
                <span v-if="report">{{report.sick_leave_to | moment("Do MMMM YYYY")}}</span>
              </td>
              <td class="text-center">
                <span v-if="report.staff">{{report.sick_leave_days}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>4. (B) Maternity Leave</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>&nbsp</th>
              <th>&nbsp</th>
              <th>From</th>
              <th>To</th>
              <th class="text-center">Number of Days</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>i</td>
              <td>Maternity Leave</td>
              <td>
                <span v-if="report">{{report.maternity_leave_from | moment("Do MMMM YYYY")}}</span>
              </td>
              <td>
                <span v-if="report">{{report.maternity_leave_to | moment("Do MMMM YYYY")}}</span>
              </td>
              <td class="text-center">
                <span v-if="report">{{report.maternity_leave_days}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>4. (C) Annual & Casual Leave</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>&nbsp</th>
              <th>&nbsp</th>
              <th>From</th>
              <th>To</th>
              <th class="text-center">Number of Days</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>i</td>
              <td>Annual Leave</td>
              <td>
                <span v-if="report">{{report.annual_leave_from | moment("Do MMMM YYYY")}}</span>
              </td>
              <td>
                <span v-if="report">{{report.annual_leave_to | moment("Do MMMM YYYY")}}</span>
              </td>
              <td class="text-center">
                <span v-if="report.staff">{{report.annual_leave_days}}</span>
              </td>
            </tr>
            <tr>
              <td>ii</td>
              <td>Casual Leave</td>
              <td>
                <span v-if="report">{{report.casual_leave_from | moment("Do MMMM YYYY")}}</span>
              </td>
              <td>
                <span v-if="report">{{report.casual_leave_to | moment("Do MMMM YYYY")}}</span>
              </td>
              <td class="text-center">
                <span v-if="report.staff">{{report.casual_leave_days}}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>5. (A) Target Setting (Division/Branch/Unit)</b>
      </h6>
      <p>The Chief Executive in consultation with the Director-General and the Directors set out the following targets for my Division/Branch/Unit to achieve:</p>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr v-for="(target, index) in report.division_targets" :key="target.id">
              <td>
                <span v-if="report">{{ target.target }}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>5. (B) Target Setting (Appraisee)</b>
      </h6>
      <p>The Head of the Department in consultation with the head of my Division/Branch/Unit set out the following targets fo me to achieve:</p>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr v-for="(target, index) in report.appraisee_targets" :key="target.id">
              <td>
                <span v-if="report">{{ target.target }}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>5. (C) Achievement of Targets</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>i</td>
              <td>The Head of the Department in consultation with the head of my Division/Branch/Unit set out the following targets fo me to achieve:</td>
              <td>
                <span v-if="report">
                  <b>{{ report.project_cost }}</b>
                </span>
              </td>
            </tr>
            <tr>
              <td>ii</td>
              <td>What was the agreed time for the completion of the Project/Assignment/Responsibility?</td>
              <td>
                <span v-if="report">
                  <b>{{ report.project_completion_time }}</b>
                </span>
              </td>
            </tr>
            <tr>
              <td>iii</td>
              <td>Was the quantity of work performed during the period of the report in conformity with set standard?</td>
              <td>
                <span v-if="report">
                  <b>{{ report.quantity_conformity }}</b>
                </span>
              </td>
            </tr>
            <tr>
              <td>iv</td>
              <td>Did the quality of the Project/Assignment/Responsibility so far completed agree with the set standard?</td>
              <td>
                <span v-if="report">
                  <b>{{ report.completed_standard }}</b>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>6. Job Description</b>
      </h6>
      <p>(a) State below in order of importance the main duties performed in relation to the targets of the period of report</p>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr v-for="(duty) in report.duties" :key="duty.id">
              <td>
                <span v-if="report">{{ duty.duty }}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <p>(b) Was there any joint discussion between you and your Supervisor on how to accomplish the targets set?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.joint_discussion_with_supervisor }}
      </p>

      <p>(c) Were you properly equiped professionally/technically/administratively to perform the jobs alloted to you? YES/NO. If not, what were your difficulties or constraints?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.properly_equiped }}
      </p>

      <p>(d) In the light of (c) above, state the various difficulties encountered in achieving the set targets and effort you and your Supervisor put in to rectify them</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.dificulty_encountered }}
      </p>

      <p>(e) What were the meethods adopted by you and your Supervisor to assist you in solving the diffult problems?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.methods_to_rectify }}
      </p>

      <p>(f) Was there any periodic review of the targets set for you by your Supervisor to achieve the desired goals? (three months/six months respectively</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.periodic_reviews }}
      </p>

      <p>(g) After the review, did your performance measure up to the prescribed standard set at the begining of the year?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.did_performance_measure_up }}
      </p>

      <p>(h) If the answer to (g) above is No, what solution or admonition was given for the shortcomings?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.shortcoming_solution_admonition }}
      </p>

      <p>(i) Was there any final evaluation of the entire targets set at the begining of the year to evaluate the total accomplishment of the goal for your Division/Branch/Section in relation to the achievements of your Ministry/Departments programme for the year?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.final_evaluation }}
      </p>

      <p>(j) State any ad hoc duties performed by yuo in addition to your normal schedule of duties which were not of a continuous nature:</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.ad_hoc_duties }}
      </p>

      <p>(k) Did the performance of these ad hoc duties affect your real duties and if so, did you bring these to the attention of your Supervisor?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.ad_hoc_performance }}
      </p>

      <p>(l) State the period that you have been on the schedule of duty referred to in (a) above:</p>
      <div class="table-responsive">
        <table class="table table-striped">
          <tbody>
            <tr>
              <td>
                <b>From:</b>
              </td>
              <td>{{ report.schedule_from }}</td>
              <td>
                <b>To:</b>
              </td>
              <td>{{ report.schedule_to }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <p>I have served for over 6 months under</p>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>(i) Reporting Officer</th>
              <th>From</th>
              <th>To</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td
                v-if="report.serving_under_reporting_officer"
              >{{ report.serving_under_reporting_officer.full_name }}</td>
              <td>{{ report.served_under_reporting_officer_from }}</td>
              <td>{{ report.served_under_reporting_officer_to }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>(ii) Countersigning Officer</th>
              <th>From</th>
              <th>To</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td
                v-if="report.serving_under_countersigning_officer"
              >{{ report.serving_under_countersigning_officer.full_name }}</td>
              <td>{{ report.served_under_countersigning_officer_from }}</td>
              <td>{{ report.served_under_countersigning_officer_to }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>(iii) Head of Department</th>
              <th>From</th>
              <th>To</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td v-if="report.serving_under_h_o_d">{{ report.serving_under_h_o_d.full_name }}</td>
              <td>{{ report.served_under_hod_from }}</td>
              <td>{{ report.served_under_hod_to }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <h6 class="text-primary">
        <b>7. Training Course/Seminars/Attended since Appointment</b>
      </h6>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Type of Training/Seminar</th>
              <th>Where the Traingin was held</th>
              <th>From</th>
              <th>To</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(training) in report.trainings" :key="training.id">
              <td>{{ training.training }}</td>
              <td>{{ training.location }}</td>
              <td>{{ training.from }}</td>
              <td>{{ training.to }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <p>Has the past trainings recieved by you enhanced your performance and productivity?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.training_enhanced_productivity }}
      </p>

      <br>
      <h6 class="text-primary">
        <b>Job Performance - Comment on duties performance during the period of this report</b>
      </h6>
      <p>(a) Looking back on the last year,which jobs assigned to you do you think you have undertaken satisfactorily in relation to the tasks/main duties performed during the period of report?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.satisfactory_tasks }}
      </p>

      <p>(b) What were the causes personal or otherwise, to which you ascribe your success or failure?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.causes_success_failure }}
      </p>

      <p>(c) Do you think that you need more training or experience to enable you do your job better? If so of what kind?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.more_training }}
      </p>

      <p>(d) Is the most effective use being made of your capabilities in your present job?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.most_effective_use }}
      </p>

      <p>(e) Do you think that your abilities could be better used in your present job or in another kind of job?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.abilities_better_used }}
      </p>

      <p>(f) During the period of this report did you have job satisfaction, if not, what were the causes?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.had_job_satisfaction }}
      </p>

      <p>(g) Any other comments on issues not mentioned above?</p>
      <p>
        <b>Answer: &nbsp</b>
        {{ report.other_comments }}
      </p>
    </div>
    <div v-if="report.is_evaluated && report.is_accepted">
      <AperFormAcceptEvaluation :staff_id="staff_id" :aper_form_id="report_id"></AperFormAcceptEvaluation>
    </div>
  </div>
</template>

<script>
import AperFormAcceptEvaluation from "../../components/Aper/Evaluate/AperFormAcceptEvaluation";

export default {
  name: "AperFormPreview",
  props: {
    staff_id: {
      required: true
    },
    report_id: {
      required: true
    }
  },
  components: {
    AperFormAcceptEvaluation
  },
  data() {
    return {
      report: {
        id: null
      }
    };
  },
  methods: {
    getData() {
      axios
        .get(`aper-forms/${this.report_id}/preview`)
        .then(res => {
          console.log(res.data);
          this.report = res.data.report;
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  created() {
    console.log("Preview Component Loaded.");
    this.getData();
  }
};
</script>

<style>
</style>
