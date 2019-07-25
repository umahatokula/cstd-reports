<template>
  <div>
    <hr>

    <h4>9. Assessment of Performance</h4>
    <div class="form-group row">
      <label
        for="department"
        class="col-sm-12 col-form-label"
      >(a) Did you and the person reported upon agree on the targets set? YES/NO</label>
      <div class="col-sm-12">
        <select v-model="evaluation.agree_on_targets" class="form-control">
          <option
            v-for="(option, index) in options"
            v-bind:value="option.id"
            :key="index"
          >{{ option.name }}</option>
        </select>
        <small v-if="errors.agree_on_targets" class="text-danger">{{ errors.agree_on_targets[0] }}</small>
      </div>
    </div>

    <div class="form-group row">
      <label
        for="department"
        class="col-sm-12 col-form-label"
      >(b) Did you and the person evaluationed upon agree on the main duties performed and the order of importance under the targets set? YES/NO (if not, discuss the changes with him and record any unresolved differences here)</label>
      <div class="col-sm-12">
        <select v-model="evaluation.agree_on_duties" class="form-control">
          <option
            v-for="(option, index) in options"
            v-bind:value="option.id"
            :key="index"
          >{{ option.name }}</option>
        </select>
        <small v-if="errors.agree_on_duties" class="text-danger">{{ errors.agree_on_duties[0] }}</small>
      </div>
    </div>

    <h4>10. Aspects of Performance</h4>
    <div class="form-group row">
      <label for="department" class="col-sm-12 col-form-label">
        <b>Assessment of Actual Performance Standards/General Ability</b>
      </label>
      <div class="col-sm-12">
        <b>
          <i>Job Assessment/General Ability</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">A</td>
              <td class="text-center">B</td>
              <td class="text-center">C</td>
              <td class="text-center">D</td>
              <td class="text-center">E</td>
              <td class="text-center">F</td>
            </tr>
            <tr>
              <td class="text-center">a</td>
              <td class="text-left">How well he/she understands, organises and does his/her job</td>
              <td class="text-center">
                <input v-model="evaluation.understands_job" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.understands_job" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.understands_job" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.understands_job" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.understands_job" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.understands_job" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td
                class="text-left"
              >How well he/she applied his/her professional/technical/administrative or any other acquired knowledge</td>
              <td class="text-center">
                <input
                  v-model="evaluation.applied_knowledge"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.applied_knowledge"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.applied_knowledge"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.applied_knowledge"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.applied_knowledge"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.applied_knowledge"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td class="text-left">How much he/she was able to accomplish within a set time frame</td>
              <td class="text-center">
                <input
                  v-model="evaluation.accomplish_in_timeframe"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.accomplish_in_timeframe"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.accomplish_in_timeframe"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.accomplish_in_timeframe"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.accomplish_in_timeframe"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.accomplish_in_timeframe"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td
                class="text-left"
              >Judgement (quality of his/her decision and contributions) where relevant</td>
              <td class="text-center">
                <input
                  v-model="evaluation.relevant_judgement"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relevant_judgement"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relevant_judgement"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relevant_judgement"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relevant_judgement"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relevant_judgement"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">e</td>
              <td class="text-left">Work-speed and accuracy</td>
              <td class="text-center">
                <input v-model="evaluation.work_speed" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.work_speed" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.work_speed" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.work_speed" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.work_speed" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.work_speed" v-bind:value="1" required type="radio">
              </td>
            </tr>
          </table>
        </div>

        <b>
          <i>Effectiveness of communications</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">A</td>
              <td class="text-center">B</td>
              <td class="text-center">C</td>
              <td class="text-center">D</td>
              <td class="text-center">E</td>
              <td class="text-center">F</td>
            </tr>
            <tr>
              <td class="text-center">f</td>
              <td class="text-left">Expression on paper</td>
              <td class="text-center">
                <input
                  v-model="evaluation.expression_on_paper"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.expression_on_paper"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.expression_on_paper"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.expression_on_paper"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.expression_on_paper"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.expression_on_paper"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">g</td>
              <td class="text-left">Oral Expression</td>
              <td class="text-center">
                <input v-model="evaluation.oral_expression" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.oral_expression" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.oral_expression" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.oral_expression" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.oral_expression" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.oral_expression" v-bind:value="1" required type="radio">
              </td>
            </tr>
          </table>
        </div>

        <b>
          <i>Human Relations</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">A</td>
              <td class="text-center">B</td>
              <td class="text-center">C</td>
              <td class="text-center">D</td>
              <td class="text-center">E</td>
              <td class="text-center">F</td>
            </tr>
            <tr>
              <td class="text-center">h</td>
              <td class="text-left">Relations with staff</td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_staff"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_staff"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_staff"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_staff"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_staff"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_staff"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">i</td>
              <td class="text-left">Relations with public</td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_public"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_public"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_public"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_public"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_public"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.relations_with_public"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">j</td>
              <td class="text-left">Management of staff</td>
              <td class="text-center">
                <input
                  v-model="evaluation.management_of_staff"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.management_of_staff"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.management_of_staff"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.management_of_staff"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.management_of_staff"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.management_of_staff"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
          </table>
        </div>

        <b>
          <i>Work out-put</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">A</td>
              <td class="text-center">B</td>
              <td class="text-center">C</td>
              <td class="text-center">D</td>
              <td class="text-center">E</td>
              <td class="text-center">F</td>
            </tr>
            <tr>
              <td class="text-center">k</td>
              <td class="text-left">Quality of work</td>
              <td class="text-center">
                <input v-model="evaluation.quality_of_work" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.quality_of_work" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.quality_of_work" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.quality_of_work" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.quality_of_work" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.quality_of_work" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">l</td>
              <td class="text-left">Productivity</td>
              <td class="text-center">
                <input v-model="evaluation.productivity" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.productivity" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.productivity" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.productivity" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.productivity" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.productivity" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">m</td>
              <td class="text-left">Effective use of figures/other data</td>
              <td class="text-center">
                <input
                  v-model="evaluation.effective_use_of_figures"
                  v-bind:value="6"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.effective_use_of_figures"
                  v-bind:value="5"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.effective_use_of_figures"
                  v-bind:value="4"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.effective_use_of_figures"
                  v-bind:value="3"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.effective_use_of_figures"
                  v-bind:value="2"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.effective_use_of_figures"
                  v-bind:value="1"
                  require
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">n</td>
              <td class="text-left">Initiative</td>
              <td class="text-center">
                <input v-model="evaluation.intiative" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.intiative" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.intiative" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.intiative" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.intiative" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.intiative" v-bind:value="1" required type="radio">
              </td>
            </tr>
          </table>
        </div>

        <div class="form-group row">
          <label for="department" class="col-sm-12 col-form-label">Please justify the gradings</label>
          <div class="col-sm-12">
            <input v-model="evaluation.human_relations_grade_justification" class="form-control">
            <small
              v-if="errors.human_relations_grade_justification"
              class="text-danger"
            >{{ errors.human_relations_grade_justification[0] }}</small>
          </div>
        </div>

        <b>
          <i>(II) Character Traits</i>
        </b>
        In assessing character traits, consideration should be given to:
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">A</td>
              <td class="text-center">B</td>
              <td class="text-center">C</td>
              <td class="text-center">D</td>
              <td class="text-center">E</td>
              <td class="text-center">F</td>
            </tr>
            <tr>
              <td class="text-center">a</td>
              <td
                class="text-left"
              >Dependability (whether he/she is able to work consistently without close supervision inspectation or compulsion</td>
              <td class="text-center">
                <input v-model="evaluation.dependability" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.dependability" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.dependability" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.dependability" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.dependability" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.dependability" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td class="text-left">Loyalty to the organisation</td>
              <td class="text-center">
                <input v-model="evaluation.loyalty" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.loyalty" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.loyalty" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.loyalty" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.loyalty" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.loyalty" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td class="text-left">Honesty</td>
              <td class="text-center">
                <input v-model="evaluation.honesty" v-bind:value="6" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.honesty" v-bind:value="5" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.honesty" v-bind:value="4" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.honesty" v-bind:value="3" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.honesty" v-bind:value="2" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.honesty" v-bind:value="1" require type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td class="text-left">Reliability under pressure</td>
              <td class="text-center">
                <input v-model="evaluation.reliability" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.reliability" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.reliability" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.reliability" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.reliability" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.reliability" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">e</td>
              <td class="text-left">Sense of responsibility</td>
              <td class="text-center">
                <input v-model="evaluation.responsibility" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.responsibility" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.responsibility" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.responsibility" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.responsibility" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.responsibility" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">f</td>
              <td class="text-left">Appearance</td>
              <td class="text-center">
                <input v-model="evaluation.appearance" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.appearance" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.appearance" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.appearance" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.appearance" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.appearance" v-bind:value="1" required type="radio">
              </td>
            </tr>
          </table>
        </div>

        <div class="form-group row">
          <label for="department" class="col-sm-12 col-form-label">Please justify the gradings</label>
          <div class="col-sm-12">
            <input v-model="evaluation.character_traits_grade_justification" class="form-control">
            <small
              v-if="errors.character_traits_grade_justification"
              class="text-danger"
            >{{ errors.character_traits_grade_justification[0] }}</small>
          </div>
        </div>

        <b>
          <i>(III) Work Habits</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">A</td>
              <td class="text-center">B</td>
              <td class="text-center">C</td>
              <td class="text-center">D</td>
              <td class="text-center">E</td>
              <td class="text-center">F</td>
            </tr>
            <tr>
              <td class="text-center">a</td>
              <td class="text-left">Punctuality at work</td>
              <td class="text-center">
                <input v-model="evaluation.punctuality" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.punctuality" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.punctuality" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.punctuality" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.punctuality" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.punctuality" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td class="text-left">Attednace at work</td>
              <td class="text-center">
                <input v-model="evaluation.attendance" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.attendance" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.attendance" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.attendance" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.attendance" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.attendance" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td class="text-left">Drive and Determination</td>
              <td class="text-center">
                <input v-model="evaluation.determination" v-bind:value="6" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.determination" v-bind:value="5" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.determination" v-bind:value="4" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.determination" v-bind:value="3" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.determination" v-bind:value="2" require type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.determination" v-bind:value="1" require type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td class="text-left">Resource Utilisation</td>
              <td class="text-center">
                <input
                  v-model="evaluation.resource_utilization"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.resource_utilization"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.resource_utilization"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.resource_utilization"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.resource_utilization"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.resource_utilization"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
          </table>
        </div>

        <div class="form-group row">
          <label for="department" class="col-sm-12 col-form-label">Please justify the gradings</label>
          <div class="col-sm-12">
            <input v-model="evaluation.work_habit_grade_justification" class="form-control">
            <small
              v-if="errors.work_habit_grade_justification"
              class="text-danger"
            >{{ errors.work_habit_grade_justification[0] }}</small>
          </div>
        </div>

        <b>
          <i>Sanctions</i>
        </b>
        <div class="form-group row">
          <label for="department" class="col-sm-12 col-form-label">
            Has any disciplinary action been taken against the officer during the period covered by this report? YES/NO
            <br>If yes, give details of sanctions
          </label>
          <div class="col-sm-12">
            <input v-model="evaluation.sanctions" class="form-control">
            <small v-if="errors.sanctions" class="text-danger">{{ errors.sanctions[0] }}</small>
          </div>
        </div>

        <b>
          <i>Reward</i>
        </b>
        <div class="form-group row">
          <label for="department" class="col-sm-12 col-form-label">
            Has the officer recieved any commendation (WRITTEN) during the year for outstanding performance?
            <br>If yes, give details of sanctions
          </label>
          <div class="col-sm-12">
            <input v-model="evaluation.reward" class="form-control">
            <small v-if="errors.reward" class="text-danger">{{ errors.reward[0] }}</small>
          </div>
        </div>

        <b>
          <i>(IV) Leadership Attainment</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>&nbsp</td>
              <td>&nbsp</td>
              <td class="text-center">A</td>
              <td class="text-center">B</td>
              <td class="text-center">C</td>
              <td class="text-center">D</td>
              <td class="text-center">E</td>
              <td class="text-center">F</td>
            </tr>
            <tr>
              <td class="text-center">a</td>
              <td
                class="text-left"
              >Does he/she encourage his/her subordinates to define agreed standards and measures for effectiveness beore hand?</td>
              <td class="text-center">
                <input v-model="evaluation.define_agreed" v-bind:value="6" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.define_agreed" v-bind:value="5" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.define_agreed" v-bind:value="4" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.define_agreed" v-bind:value="3" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.define_agreed" v-bind:value="2" required type="radio">
              </td>
              <td class="text-center">
                <input v-model="evaluation.define_agreed" v-bind:value="1" required type="radio">
              </td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td
                class="text-left"
              >Does he/she encourage and train his/her subordinates to avoid late assessment of goal?</td>
              <td class="text-center">
                <input
                  v-model="evaluation.avoid_late_assessment"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.avoid_late_assessment"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.avoid_late_assessment"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.avoid_late_assessment"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.avoid_late_assessment"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.avoid_late_assessment"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td
                class="text-left"
              >Does he/she show good examples of punctuality, efficiency and high degree of responsibility in whatever he/she does?</td>
              <td class="text-center">
                <input
                  v-model="evaluation.show_good_examples"
                  v-bind:value="6"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.show_good_examples"
                  v-bind:value="5"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.show_good_examples"
                  v-bind:value="4"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.show_good_examples"
                  v-bind:value="3"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.show_good_examples"
                  v-bind:value="2"
                  require
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.show_good_examples"
                  v-bind:value="1"
                  require
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td
                class="text-left"
              >Does he/she make suggestion for changes/adjustment methods/procedures that ssignificantly contributes to his own work or that of any associate/subordinate?</td>
              <td class="text-center">
                <input
                  v-model="evaluation.suggestion_for_changes"
                  v-bind:value="6"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.suggestion_for_changes"
                  v-bind:value="5"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.suggestion_for_changes"
                  v-bind:value="4"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.suggestion_for_changes"
                  v-bind:value="3"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.suggestion_for_changes"
                  v-bind:value="2"
                  required
                  type="radio"
                >
              </td>
              <td class="text-center">
                <input
                  v-model="evaluation.suggestion_for_changes"
                  v-bind:value="1"
                  required
                  type="radio"
                >
              </td>
            </tr>
          </table>
        </div>

        <b>
          <i>11. Overall Assessment</i>
        </b>
        <p>From the above assessment, indicate the overal performance of his/her duties by ticking the appropriate box below</p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td class="text-left">A</td>
              <td
                class="text-left"
              >An exceptionally valuable member of staff, performance well above the required standard for the job</td>
              <td class="text-center">Outstanding</td>
              <td class="text-center">
                <input
                  v-model="evaluation.overall_assessment"
                  v-bind:value="'outstanding'"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-left">B</td>
              <td
                class="text-left"
              >Displays good all round level of effectiveness; performance meets requirements in all important task</td>
              <td class="text-center">Very Good</td>
              <td class="text-center">
                <input
                  v-model="evaluation.overall_assessment"
                  v-bind:value="'very_good'"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-left">C</td>
              <td
                class="text-left"
              >A competent member of the staff, generally achieves the standard required</td>
              <td class="text-center">Good</td>
              <td class="text-center">
                <input
                  v-model="evaluation.overall_assessment"
                  v-bind:value="'good'"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-left">D</td>
              <td
                class="text-left"
              >Completes all assignments fairly satisfactorily within agreed date</td>
              <td class="text-center">Fair</td>
              <td class="text-center">
                <input
                  v-model="evaluation.overall_assessment"
                  v-bind:value="'fair'"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-left">E</td>
              <td
                class="text-left"
              >Performance does not always reach the required standard; room for improvement</td>
              <td class="text-center">Poor</td>
              <td class="text-center">
                <input
                  v-model="evaluation.overall_assessment"
                  v-bind:value="'poor'"
                  required
                  type="radio"
                >
              </td>
            </tr>
            <tr>
              <td class="text-left">F</td>
              <td class="text-left">Performance does not meet required standard</td>
              <td class="text-center">Very Poor</td>
              <td class="text-center">
                <input
                  v-model="evaluation.overall_assessment"
                  v-bind:value="'very_poor'"
                  required
                  type="radio"
                >
              </td>
            </tr>
          </table>
        </div>

        <b>
          <i>12. Training Needs</i>
        </b>
        <p>Indicate training needs necessary to improve the performance or potential of the officer:</p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="text-left">Training Need</th>
                <th class="text-center">
                  <div @click="addTrainingNeed" class="btn btn-primary btn-sm">Add</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(training, index) in training_needs" :key="index">
                <td scope="row">
                  <input v-model="training.training_need" type="text" class="form-control" required>
                </td>
                <td class="text-center">
                  <div @click="removeTrainingNeed(index)" class="btn btn-danger btn-sm">Remove</div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <small v-if="errors.training_needs" class="text-danger">{{ errors.training_needs[0] }}</small>

        <b>
          <i>13. General Remarks</i>
        </b>
        <div class="form-group row">
          <label
            for="department"
            class="col-sm-12 col-form-label"
          >Please provide any additional relevant information here drawing attention to any particular strnght or weaknesses and indicate special aptitudes (if any) demonstrated by the officer:</label>
          <div class="col-sm-12">
            <textarea v-model="evaluation.general_remarks" class="form-control"></textarea>
            <small v-if="errors.general_remarks" class="text-danger">{{ errors.general_remarks[0] }}</small>
          </div>
        </div>

        <b>
          <i>14. Do you suggest the officer for</i>
        </b>
        <div class="row">
          <div class="col-md-3">(A) A different job in thesame grade?</div>
          <div class="col-md-3">
            <select v-model="evaluation.different_job" class="form-control">
              <option
                v-for="(option, index) in options"
                v-bind:value="option.id"
                :key="index"
              >{{ option.name }}</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div
            class="col-md-3"
          >(B) Transfer to a job at a similar level in another occupational group or cadre?</div>
          <div class="col-md-3">
            <select v-model="evaluation.transfer_job" class="form-control">
              <option
                v-for="(option, index) in options"
                v-bind:value="option.id"
                :key="index"
              >{{ option.name }}</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div
            class="col-12"
          >If you have answered YES to either question, say which kind of job and give reasons below:</div>
          <div class="col-12">
            <textarea v-model="evaluation.reason_for_different_transfer_job" class="form-control"></textarea>
          </div>
        </div>
        <br>
        <b>
          <i>15. Promotability</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td>A</td>
              <td>Exceptionally well qualified the officer already seems likely to stand out in the next higher post</td>
              <td>
                <input type="radio" v-model="evaluation.promotability" v-bind:value="'exceptional'">
              </td>
            </tr>
            <tr>
              <td>B</td>
              <td>Ready for promotion</td>
              <td>
                <input type="radio" v-model="evaluation.promotability" v-bind:value="'ready'">
              </td>
            </tr>
            <tr>
              <td>C</td>
              <td>Has promotion potentials; has completed the required number of years</td>
              <td>
                <input type="radio" v-model="evaluation.promotability" v-bind:value="'potentials'">
              </td>
            </tr>
            <tr>
              <td>D</td>
              <td>Not yet ripe for promotion (for non-fulfilement of conditions prescribed for promotion in line with the Guidelines on civil Service Reforms)</td>
              <td>
                <input type="radio" v-model="evaluation.promotability" v-bind:value="'not_ripe'">
              </td>
            </tr>
            <tr>
              <td>E</td>
              <td>No evidence of promotion potentials at present</td>
              <td>
                <input type="radio" v-model="evaluation.promotability" v-bind:value="'no_evidence'">
              </td>
            </tr>
            <tr>
              <td>F</td>
              <td>Unlikely to qualify as he/she seems to have reached the limit of his/her capacity</td>
              <td>
                <input
                  type="radio"
                  v-model="evaluation.promotability"
                  v-bind:value="'reached_capacity'"
                >
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <h5 class="text-danger">DECLARATION</h5>
    <p>
      <input type="checkbox" v-model="evaluation.is_evaluated"> I
      <b>{{staff.full_name}}</b> hereby declare that the above report has been written with the highest sense of responsibility and to the best of my judgement and with due regard to my conscience.
      <b>[Date: {{currentDate}}]</b>
    </p>

    <hr>
    <div class="row text-center">
      <div class="col-md-12">
        <button @click="saveEvaluation" class="btn btn-primary btn-sm">Save Evaluation</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AperFormEvaluate",
  props: {
    staff_id: {
      required: true
    },
    report_id: {
      required: true
    }
  },
  data() {
    return {
      staff: null,
      evaluation: {
        aper_form_id: null,
        is_evaluated: false,
        agree_on_targets: null,
        agree_on_duties: null,
        understands_job: null,
        applied_knowledge: null,
        accomplish_in_timeframe: null,
        relevant_judgement: null,
        work_speed: null,
        expression_on_paper: null,
        oral_expression: null,
        relations_with_staff: null,
        relations_with_public: null,
        management_of_staff: null,
        quality_of_work: null,
        productivity: null,
        effective_use_of_figures: null,
        intiative: null,
        human_relations_grade_justification: null,
        dependability: null,
        loyalty: null,
        honesty: null,
        reliability: null,
        responsibility: null,
        appearance: null,
        character_traits_grade_justification: null,
        punctuality: null,
        attendance: null,
        determination: null,
        resource_utilization: null,
        work_habit_grade_justification: null,
        sanctions: null,
        reward: null,
        define_agreed: null,
        avoid_late_assessment: null,
        show_good_examples: null,
        suggestion_for_changes: null,
        overall_assessment: null,
        different_job: null,
        transfer_job: null,
        reason_for_different_transfer_job: null,
        promotability: null
      },
      options: [
        {
          id: "yes",
          name: "Yes"
        },
        {
          id: "no",
          name: "No"
        }
      ],
      errors: [],
      training_needs: [{ training_need: "" }]
    };
  },
  computed: {
    currentDate: function() {
      return new Date();
    }
  },
  methods: {
    addTrainingNeed() {
      this.training_needs.push({
        training_need: ""
      });
    },
    removeTrainingNeed(index) {
      this.training_needs.splice(index, 1);
    },
    saveEvaluation() {

      if(this.evaluation.is_evaluated) {
        const confirmation = confirm("Are you sure? This action is irreversable.");

        if (!confirmation) {
          return;
        }
      }
     
      this.evaluation.training_needs = this.training_needs;
      console.log(this.evaluation);

      axios
        .post(`aper-forms/${this.report_id}/store/evaluate`, this.evaluation)
        .then(res => {
          console.log(res.data);
          var getUrl = window.location;
          var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1];
          window.location.href = `${baseUrl}/public/aper-forms`;
        })
        .catch(e => {
          console.log(e);
        });
    },
    getData() {
      axios
        .get(`staff/${this.staff_id}`)
        .then(res => {
          console.log(res.data);
          this.staff = res.data.staff;
        })
        .catch(e => {
          console.log(e);
        });

      axios
        .get(`aper-forms/${this.report_id}/evaluate`)
        .then(res => {
          console.log(res.data);
          // this.evaluation.aper_form_id = res.data.aper_form_id

          if (res.data.evaluation) {
            this.evaluation = res.data.evaluation;
          }

          if (res.data.evaluation.training_needs) {
            this.training_needs = res.data.evaluation.training_needs;
          }
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  created() {
    console.log("Evaluation Component Loaded.");

    this.evaluation.aper_form_id = this.report_id;

    this.getData();
  }
};
</script>

<style>
</style>
