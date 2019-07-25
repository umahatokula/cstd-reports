<template>
<div>

    <hr>

    <fieldset>

        <h5>
            6. Job Description
        </h5>
        <p> (a) State below in order of importance the main duties performed in relation to the targets of the period of report</p>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left">Duty</th>
                    <th class="text-center">
                        <div @click="addDuty" class="btn btn-primary btn-sm">Add</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(duty, index) in duties" :key="index">
                    <td scope="row">
                        <input v-model="duty.duty" type="text" class="form-control">
                    </td>
                    <td class="text-center">
                        <div @click="removeDuty(index)" class="btn btn-danger btn-sm">Remove</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <p> (b) Was there any joint discussion between you and your Supervisor on how to accomplish the targets set?</p>
        <input v-model="report.joint_discussion_with_supervisor" type="text" class="form-control">
        <br>

        <p> (c) Were you properly equiped professionally/technically/administratively to perform the jobs alloted to you? YES/NO. If not, what were your difficulties or constraints?</p>
        <input v-model="report.properly_equiped" type="text" class="form-control">
        <br>

        <p> (d) In the light of (c) above, state the various difficulties encountered in achieving the set targets and effort you and your Supervisor put in to rectify them</p>
        <input v-model="report.dificulty_encountered" type="text" class="form-control">
        <br>

        <p> (e) What were the meethods adopted by you and your Supervisor to assist you in solving the diffult problems?</p>
        <input v-model="report.methods_to_rectify" type="text" class="form-control">
        <br>

        <p> (f) Was there any periodic review of the targets set for you by your Supervisor to achieve the desired goals? (three months/six months respectively</p>
        <input v-model="report.periodic_reviews" type="text" class="form-control">
        <br>

        <p> (g) After the review, did your performance measure up to the prescribed standard set at the begining of the year?</p>
        <input v-model="report.did_performance_measure_up" type="text" class="form-control">
        <br>

        <p> (h) If the answer to (g) above is No, what solution or admonition was given for the shortcomings?</p>
        <input v-model="report.shortcoming_solution_admonition" type="text" class="form-control">
        <br>

        <p> (i) Was there any final evaluation of the entire targets set at the begining of the year to evaluate the total accomplishment of the goal for your Division/Branch/Section in relation to the achievements of your Ministry/Departments
            programme for the year?</p>
        <input v-model="report.final_evaluation" type="text" class="form-control">
        <br>

        <p> (j) State any <i>ad hoc</i> duties performed by yuo in addition to your normal schedule of duties which were not of a continuous nature:</p>
        <input v-model="report.ad_hoc_duties" type="text" class="form-control">
        <br>

        <p> (k) Did the performance of these <i>ad hoc</i> duties affect your real duties and if so, did you bring these to the attention of your Supervisor?</p>
        <input v-model="report.ad_hoc_performance" type="text" class="form-control">
        <br>

        <p> (l) State the period that you have been on the schedule of duty referred to in (a) above:</p>
        <div class="row">
            <div class="col-sm-1">
                From:
            </div>
            <div class="col-sm-3">
                <input v-model="report.schedule_from" type="date" class="form-control">
            </div>
            <div class="col-sm-1">
                To:
            </div>
            <div class="col-sm-3">
                <input v-model="report.schedule_to" type="date" class="form-control">
            </div>
        </div>
        <br>

        <p>I have served for over 6 months under</p>

        <span class="text-info">(i) Reporting Officer</span>
        <div class="row">
            <div class="col-sm-4">
                <select v-model="report.served_under_reporting_officer" class="form-control">
                    <option v-for="(staff, index) in staffs" v-bind:value="staff.id" :key="index">{{ staff.full_name }}</option>
                </select>
            </div>
            <div class="col-sm-1">
                From:
            </div>
            <div class="col-sm-3">
                <input v-model="report.served_under_reporting_officer_from" type="date" class="form-control">
            </div>
            <div class="col-sm-1">
                To:
            </div>
            <div class="col-sm-3">
                <input v-model="report.served_under_reporting_officer_to" type="date" class="form-control">
            </div>
        </div>

        <br>
        <span class="text-info">(ii) Countersigning Officer</span>
        <div class="row">
            <div class="col-sm-4">
                <select v-model="report.served_under_countersigning_officer" class="form-control">
                    <option v-for="(staff, index) in staffs" v-bind:value="staff.id" :key="index">{{ staff.full_name }}</option>
                </select>
            </div>
            <div class="col-sm-1">
                From:
            </div>
            <div class="col-sm-3">
                <input v-model="report.served_under_countersigning_officer_from" type="date" class="form-control">
            </div>
            <div class="col-sm-1">
                To:
            </div>
            <div class="col-sm-3">
                <input v-model="report.served_under_countersigning_officer_to" type="date" class="form-control">
            </div>
        </div>

        <br>
        <span class="text-info">(iii) Head of Department</span>
        <div class="row">
            <div class="col-sm-4">
                <select v-model="report.served_under_hod" class="form-control">
                    <option v-for="(staff, index) in staffs" v-bind:value="staff.id" :key="index">{{ staff.full_name }}</option>
                </select>
            </div>
            <div class="col-sm-1">
                From:
            </div>
            <div class="col-sm-3">
                <input v-model="report.served_under_hod_from" type="date" class="form-control">
            </div>
            <div class="col-sm-1">
                To:
            </div>
            <div class="col-sm-3">
                <input v-model="report.served_under_hod_to" type="date" class="form-control">
            </div>
        </div>

    </fieldset>

    <hr>
    <div class="row text-center">
        <div class="col-md-12">
            <button @click="saveAndProceed" class="btn btn-success btn-sm">Save Job Description & Proceed</button>
            <button @click="quit" class="btn btn-danger btn-sm">Quit</button>
        </div>
    </div>

</div>
</template>

<script>
export default {
    name: "JobDescription",
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
                staff_id: null,
                joint_discussion_with_supervisor: null,
                properly_equiped: null,
                dificulty_encountered: null,
                methods_to_rectify: null,
                periodic_reviews: null,
                did_performance_measure_up: null,
                shortcoming_solution_admonition: null,
                final_evaluation: null,
                ad_hoc_duties: null,
                ad_hoc_performance: null,
                schedule_from: null,
                schedule_to: null,
                served_under_reporting_officer: null,
                served_under_reporting_officer_from: null,
                served_under_reporting_officer_to: null,
                served_under_countersigning_officer: null,
                served_under_countersigning_officer_from: null,
                served_under_countersigning_officer_to: null,
                served_under_hod: null,
                served_under_hod_from: null,
                served_under_hod_to: null,
            },
            errors: [],
            staffs: [],
            duties: [{
                duty: ""
            }]
        };
    },
    methods: {
        addDuty() {
            this.duties.push({
                duty: ""
            });
        },

        removeDuty(index) {
            this.duties.splice(index, 1);
        },

        saveAndProceed() {
            this.report.staff_id = this.staff_id;
            this.report.year = new Date().getFullYear();
            this.report.divisionTargets = this.divisionTargets;
            this.report.appraiseeTargets = this.appraiseeTargets;

            axios
                .post(`aper-forms/store/jobs`, this.report)
                .then(res => {
                    //   console.log(res.data);
                    this.$emit("record-saved", {
                        nextForm: "trainings"
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
            var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split("/")[1];
            window.location.href = baseUrl + "/public/aper-forms";
        },

        getData() {
            axios
                .get(`aper-forms/create`)
                .then(res => {
                    //   console.log(res.data);
                    this.staffs = res.data.staffs;
                    if (res.data.report) {
                        this.duties = res.data.report.duties;
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
        console.log('Job Description Component Loaded.')
        this.report.current_form_page = this.currentTab;
        this.report.staff_id = this.staff_id;
        this.getData();
    }
};
</script>

<style>
</style>
