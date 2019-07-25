<template>
  <div>
    <div class="row">
      <div class="col-12 text-center">
        <h3>ANNUAL PERFORMANCE EVALUATION REPORT</h3>
      </div>
    </div>
    <hr>
    <ul
      class="nav nav-pills nav-fill"
      id="myTab"
      role="tablist"
    >
      <li
        v-for="(tab) in tabs"
        :key="tab"
        class="nav-item"
      >
        <a
          @click="currentTab = tab"
          :class="['nav-link', { active: currentTab === tab }]"
          id="home-tab"
          data-toggle="tab"
          href="#currentTab"
          role="tab"
          aria-controls="currentTab"
          aria-selected="true"
        >{{tab}}</a>
      </li>
    </ul>

    <div
      class="tab-content"
      id="myTabContent"
    >
      <div
        class="tab-pane fade show active"
        id="currentTab"
        role="tabpanel"
        aria-labelledby="personal-tab"
      >
        <br>
        <keep-alive>
          <component
            :is="currentTab.toLowerCase()"
            :staff_id="staff_id"
            :currentTab="currentTab.toLowerCase()"
            @record-saved="recordSaved($event)"
          ></component>
        </keep-alive>
      </div>
    </div>

  </div>
</template>

<script>
import trainings from "../../../components/Aper/Create/Trainings.vue";
import job from "../../../components/Aper/Create/JobDescription.vue";
import targets from "../../../components/Aper/Create/Targets.vue";
import personal from "../../../components/Aper/Create/PersonalRecord.vue";

$("#myTab a").on("click", function(e) {
  e.preventDefault();
  $(this).tab("show");
});

export default {
  name: "AperForm",
  props: {
    staff_id: {
      required: true
    }
  },
  components: {
    trainings,
    job,
    targets,
    personal
  },
  data() {
    return {
      currentTab: "Personal",
      tabs: ["Personal", "Targets", "Job", "Trainings"]
    };
  },
  computed: {
    currentTabComponent: function() {
      return this.currentTab.toLowerCase();
    }
  },
  methods: {
    recordSaved(data) {
      // console.log(data.nextForm);
      this.currentTab = data.nextForm;
    }
  }
};
</script>

<style>
</style>
