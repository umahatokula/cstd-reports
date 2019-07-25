<template>
<div>

    <hr>

    <h4>PART II</h4>
    <fieldset>

        <h5>
            5. (A) Target Setting
        </h5>
        <p>The Chief Executive in consultation with the Director-General and the Directors set out the following targets for my Division/Branch/Unit to achieve:</p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">Target</th>
                        <th class="text-center">
                            <div @click="addDivisionTargets" class="btn btn-primary btn-sm">Add</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(divisionTarget, index) in divisionTargets" :key="index">
                        <td scope="row">
                            <input v-model="divisionTarget.target" type="text" class="form-control">
                        </td>
                        <td class="text-center">
                            <div @click="removeDivisionTarget(index)" class="btn btn-danger btn-sm">Remove</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <h5>
            5. (B) Target Setting for the Appraisee
        </h5>
        <p> The Head of the Department in consultation with the head of my Division/Branch/Unit set out the following targets fo me to achieve:</p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">Target</th>
                        <th class="text-center">
                            <div @click="addAppraiseeTargets" class="btn btn-primary btn-sm">Add</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(appraiseeTarget, index) in appraiseeTargets" :key="index">
                        <td scope="row">
                            <input v-model="appraiseeTarget.target" type="text" class="form-control">
                        </td>
                        <td class="text-center">
                            <div @click="removeAppraiseeTarget(index)" class="btn btn-danger btn-sm">Remove</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h5>
            5. (C) Achievement of Targets
        </h5>
        <p> (i) What was the estimate of the Project/Assignment/Responsibility set for your Division/Branch/Section?</p>
        <input v-model="report.project_cost" type="text" class="form-control">
        <small v-if="errors.project_cost" class="text-danger">{{ errors.project_cost[0] }}</small>
        <br>

        <p> (ii) What was the agreed time for the completion of the Project/Assignment/Responsibility?</p>
        <input v-model="report.project_completion_time" type="text" class="form-control">
        <small v-if="errors.project_completion_time" class="text-danger">{{ errors.project_completion_time[0] }}</small>
        <br>

        <p> (iii) Was the quantity of work performed during the period of the report in conformity with set standard?</p>
        <input v-model="report.quantity_conformity" type="text" class="form-control">
        <small v-if="errors.quantity_conformity" class="text-danger">{{ errors.quantity_conformity[0] }}</small>
        <br>

        <p> (iv) Did the quality of the Project/Assignment/Responsibility so far completed agree with the set standard?</p>
        <input v-model="report.completed_standard" type="text" class="form-control">
        <small v-if="errors.completed_standard" class="text-danger">{{ errors.completed_standard[0] }}</small>

    </fieldset>

    <hr>
    <div class="row text-center">
        <div class="col-md-12">
            <button @click="saveAndProceed" class="btn btn-success btn-sm">Save Targets & Proceed</button>
            <button @click="quit" class="btn btn-danger btn-sm">Quit</button>
        </div>
    </div>

</div>
</template>

<script>
export default {
    name: "Targets",
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
                project_cost: null,
                project_completion_time: null,
                quantity_conformity: null,
                completed_standard: null
            },
            errors: [],
            divisionTargets: [{
                target: ""
            }],
            appraiseeTargets: [{
                target: ""
            }]
        };
    },
    methods: {
        addDivisionTargets() {
            this.divisionTargets.push({
                target: ""
            });
        },

        removeDivisionTarget(index) {
            this.divisionTargets.splice(index, 1);
        },

        addAppraiseeTargets() {
            this.appraiseeTargets.push({
                target: ""
            });
        },

        removeAppraiseeTarget(index) {
            this.appraiseeTargets.splice(index, 1);
        },

        saveAndProceed() {
            this.report.staff_id = this.staff_id;
            this.report.year = new Date().getFullYear();
            this.report.divisionTargets = this.divisionTargets;
            this.report.appraiseeTargets = this.appraiseeTargets;

            axios
                .post(`aper-forms/store/targets`, this.report)
                .then(res => {
                    //   console.log(res.data);
                    this.$emit("record-saved", {
                        nextForm: "job"
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
                    this.departments = res.data.departments;
                    this.divisions = res.data.divisions;
                    this.units = res.data.units;
                    this.gradeLevels = res.data.gradeLevels;
                    if (res.data.report) {
                        this.divisionTargets = res.data.report.division_targets;
                        this.appraiseeTargets = res.data.report.appraisee_targets;
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
        console.log('Target Component Loaded.')
        this.report.current_form_page = this.currentTab;
        this.report.staff_id = this.staff_id;
        this.getData();
    }
};
</script>

<style>
</style>
