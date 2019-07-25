<template>

  <div>

    <hr>
    <div class="row">
      <div class="col-6 text-center">
        <button
          @click="currentTabComponent = 'preview'"
          class="btn btn-lg btn-primary"
        >Preview</button>
      </div>
      <div class="col-6 text-center">
        <button
          @click="currentTabComponent = 'evaluate'"
          class="btn btn-lg btn-warning"
        >Evaluate</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <keep-alive>
          <component
            :is="currentTabComponent"
            :staff_id="staff_id"
            :report_id="report_id"
          ></component>
        </keep-alive>
      </div>
    </div>

  </div>
</template>

<script>
import preview from "../../../components/Aper/AperFormPreview.vue";
import evaluate from "../../../components/Aper/Evaluate/AperFormEvaluate.vue";

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
    preview,
    evaluate
  },
  data() {
    return {
      currentTabComponent: "preview"
    };
  }
};
</script>

<style>
</style>

