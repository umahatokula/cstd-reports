<template>
  <div>
    <hr>

        
    <h6 class="text-primary">
        <b>9. Assessment of Performance</b>
    </h6>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td scope="row">(a) Did you and the person reported upon agree on the targets set? YES/NO</td>
          <td>{{evaluation.agree_on_targets}}</td>
        </tr>
        <tr>
          <td
            scope="row"
          >(b) Did you and the person evaluationed upon agree on the main duties performed and the order of importance under the targets set? YES/NO (if not, discuss the changes with him and record any unresolved differences here)</td>
          <td>{{evaluation.agree_on_duties}}</td>
        </tr>
      </tbody>
    </table>

        
        <h6 class="text-primary">
            <b>10. Aspects of Performance</b>
        </h6>
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
              <td class="text-center">a</td>
              <td class="text-left">How well he/she understands, organises and does his/her job</td>
              <td class="text-center" v-if="evaluation.understands_job == 6">A</td>
              <td class="text-center" v-if="evaluation.understands_job == 5">B</td>
              <td class="text-center" v-if="evaluation.understands_job == 4">C</td>
              <td class="text-center" v-if="evaluation.understands_job == 3">D</td>
              <td class="text-center" v-if="evaluation.understands_job == 2">E</td>
              <td class="text-center" v-if="evaluation.understands_job == 1">F</td>
              <td class="text-center" v-if="!evaluation.understands_job == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td
                class="text-left"
              >How well he/she applied his/her professional/technical/administrative or any other acquired knowledge</td>
              <td class="text-center" v-if="evaluation.applied_knowledge == 6">A</td>
              <td class="text-center" v-if="evaluation.applied_knowledge == 5">B</td>
              <td class="text-center" v-if="evaluation.applied_knowledge == 4">C</td>
              <td class="text-center" v-if="evaluation.applied_knowledge == 3">D</td>
              <td class="text-center" v-if="evaluation.applied_knowledge == 2">E</td>
              <td class="text-center" v-if="evaluation.applied_knowledge == 1">F</td>
              <td class="text-center" v-if="!evaluation.applied_knowledge == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td class="text-left">How much he/she was able to accomplish within a set time frame</td>
              <td class="text-center" v-if="evaluation.accomplish_in_timeframe == 6">A</td>
              <td class="text-center" v-if="evaluation.accomplish_in_timeframe == 5">B</td>
              <td class="text-center" v-if="evaluation.accomplish_in_timeframe == 4">C</td>
              <td class="text-center" v-if="evaluation.accomplish_in_timeframe == 3">D</td>
              <td class="text-center" v-if="evaluation.accomplish_in_timeframe == 2">E</td>
              <td class="text-center" v-if="evaluation.accomplish_in_timeframe == 1">F</td>
              <td class="text-center" v-if="!evaluation.accomplish_in_timeframe == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td
                class="text-left"
              >Judgement (quality of his/her decision and contributions) where relevant</td>
              <td class="text-center" v-if="evaluation.relevant_judgement == 6">A</td>
              <td class="text-center" v-if="evaluation.relevant_judgement == 5">B</td>
              <td class="text-center" v-if="evaluation.relevant_judgement == 4">C</td>
              <td class="text-center" v-if="evaluation.relevant_judgement == 3">D</td>
              <td class="text-center" v-if="evaluation.relevant_judgement == 2">E</td>
              <td class="text-center" v-if="evaluation.relevant_judgement == 1">F</td>
              <td class="text-center" v-if="!evaluation.relevant_judgement == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">e</td>
              <td class="text-left">Work-speed and accuracy</td>
              <td class="text-center" v-if="evaluation.work_speed == 6">A</td>
              <td class="text-center" v-if="evaluation.work_speed == 5">B</td>
              <td class="text-center" v-if="evaluation.work_speed == 4">C</td>
              <td class="text-center" v-if="evaluation.work_speed == 3">D</td>
              <td class="text-center" v-if="evaluation.work_speed == 2">E</td>
              <td class="text-center" v-if="evaluation.work_speed == 1">F</td>
              <td class="text-center" v-if="!evaluation.work_speed == 1">Not Graded</td>
            </tr>
          </table>
        </div>

        <b>
          <i>Effectiveness of communications</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td class="text-center">f</td>
              <td class="text-left">Expression on paper</td>
              <td class="text-center" v-if="evaluation.expression_on_paper == 6">A</td>
              <td class="text-center" v-if="evaluation.expression_on_paper == 5">B</td>
              <td class="text-center" v-if="evaluation.expression_on_paper == 4">C</td>
              <td class="text-center" v-if="evaluation.expression_on_paper == 3">D</td>
              <td class="text-center" v-if="evaluation.expression_on_paper == 2">E</td>
              <td class="text-center" v-if="evaluation.expression_on_paper == 1">F</td>
              <td class="text-center" v-if="!evaluation.expression_on_paper == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">g</td>
              <td class="text-left">Oral Expression</td>
              <td class="text-center" v-if="evaluation.oral_expression == 6">A</td>
              <td class="text-center" v-if="evaluation.oral_expression == 5">B</td>
              <td class="text-center" v-if="evaluation.oral_expression == 4">C</td>
              <td class="text-center" v-if="evaluation.oral_expression == 3">D</td>
              <td class="text-center" v-if="evaluation.oral_expression == 2">E</td>
              <td class="text-center" v-if="evaluation.oral_expression == 1">F</td>
              <td class="text-center" v-if="!evaluation.oral_expression == 1">Not Graded</td>
            </tr>
          </table>
        </div>

        <b>
          <i>Human Relations</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td class="text-center">h</td>
              <td class="text-left">Relations with staff</td>
              <td class="text-center" v-if="evaluation.relations_with_staff == 6">A</td>
              <td class="text-center" v-if="evaluation.relations_with_staff == 5">B</td>
              <td class="text-center" v-if="evaluation.relations_with_staff == 4">C</td>
              <td class="text-center" v-if="evaluation.relations_with_staff == 3">D</td>
              <td class="text-center" v-if="evaluation.relations_with_staff == 2">E</td>
              <td class="text-center" v-if="evaluation.relations_with_staff == 1">F</td>
              <td class="text-center" v-if="!evaluation.relations_with_staff == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">i</td>
              <td class="text-left">Relations with public</td>
              <td class="text-center" v-if="evaluation.relations_with_public == 6">A</td>
              <td class="text-center" v-if="evaluation.relations_with_public == 5">B</td>
              <td class="text-center" v-if="evaluation.relations_with_public == 4">C</td>
              <td class="text-center" v-if="evaluation.relations_with_public == 3">D</td>
              <td class="text-center" v-if="evaluation.relations_with_public == 2">E</td>
              <td class="text-center" v-if="evaluation.relations_with_public == 1">F</td>
              <td class="text-center" v-if="!evaluation.relations_with_public == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">j</td>
              <td class="text-left">Management of staff</td>
              <td class="text-center" v-if="evaluation.management_of_staff == 6">A</td>
              <td class="text-center" v-if="evaluation.management_of_staff == 5">B</td>
              <td class="text-center" v-if="evaluation.management_of_staff == 4">C</td>
              <td class="text-center" v-if="evaluation.management_of_staff == 3">D</td>
              <td class="text-center" v-if="evaluation.management_of_staff == 2">E</td>
              <td class="text-center" v-if="evaluation.management_of_staff == 1">F</td>
              <td class="text-center" v-if="!evaluation.management_of_staff == 1">Not Graded</td>
            </tr>
          </table>
        </div>

        <b>
          <i>Work out-put</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td class="text-center">k</td>
              <td class="text-left">Quality of work</td>
              <td class="text-center" v-if="evaluation.quality_of_work == 6">A</td>
              <td class="text-center" v-if="evaluation.quality_of_work == 5">B</td>
              <td class="text-center" v-if="evaluation.quality_of_work == 4">C</td>
              <td class="text-center" v-if="evaluation.quality_of_work == 3">D</td>
              <td class="text-center" v-if="evaluation.quality_of_work == 2">E</td>
              <td class="text-center" v-if="evaluation.quality_of_work == 1">F</td>
              <td class="text-center" v-if="!evaluation.quality_of_work == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">l</td>
              <td class="text-left">Productivity</td>
              <td class="text-center" v-if="evaluation.productivity == 6">A</td>
              <td class="text-center" v-if="evaluation.productivity == 5">B</td>
              <td class="text-center" v-if="evaluation.productivity == 4">C</td>
              <td class="text-center" v-if="evaluation.productivity == 3">D</td>
              <td class="text-center" v-if="evaluation.productivity == 2">E</td>
              <td class="text-center" v-if="evaluation.productivity == 1">F</td>
              <td class="text-center" v-if="!evaluation.productivity == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">m</td>
              <td class="text-left">Effective use of figures/other data</td>
              <td class="text-center" v-if="evaluation.effective_use_of_figures == 6">A</td>
              <td class="text-center" v-if="evaluation.effective_use_of_figures == 5">B</td>
              <td class="text-center" v-if="evaluation.effective_use_of_figures == 4">C</td>
              <td class="text-center" v-if="evaluation.effective_use_of_figures == 3">D</td>
              <td class="text-center" v-if="evaluation.effective_use_of_figures == 2">E</td>
              <td class="text-center" v-if="evaluation.effective_use_of_figures == 1">F</td>
              <td class="text-center" v-if="!evaluation.effective_use_of_figures == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">n</td>
              <td class="text-left">Initiative</td>
              <td class="text-center" v-if="evaluation.intiative == 6">A</td>
              <td class="text-center" v-if="evaluation.intiative == 5">B</td>
              <td class="text-center" v-if="evaluation.intiative == 4">C</td>
              <td class="text-center" v-if="evaluation.intiative == 3">D</td>
              <td class="text-center" v-if="evaluation.intiative == 2">E</td>
              <td class="text-center" v-if="evaluation.intiative == 1">F</td>
              <td class="text-center" v-if="!evaluation.intiative == 1">Not Graded</td>
            </tr>
          </table>
        </div>

        <table class="table table-bordered">
          <tbody>
            <tr>
              <td scope="row">Please justify the gradings</td>
              <td>{{evaluation.human_relations_grade_justification}}</td>
            </tr>
          </tbody>
        </table>

        <b>
          <i>(II) Character Traits</i>
        </b>
        In assessing character traits, consideration should be given to:
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td class="text-center">a</td>
              <td
                class="text-left"
              >Dependability (whether he/she is able to work consistently without close supervision inspectation or compulsion</td>
              <td class="text-center" v-if="evaluation.dependability == 6">A</td>
              <td class="text-center" v-if="evaluation.dependability == 5">B</td>
              <td class="text-center" v-if="evaluation.dependability == 4">C</td>
              <td class="text-center" v-if="evaluation.dependability == 3">D</td>
              <td class="text-center" v-if="evaluation.dependability == 2">E</td>
              <td class="text-center" v-if="evaluation.dependability == 1">F</td>
              <td class="text-center" v-if="!evaluation.dependability == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td class="text-left">Loyalty to the organisation</td>
              <td class="text-center" v-if="evaluation.loyalty == 6">A</td>
              <td class="text-center" v-if="evaluation.loyalty == 5">B</td>
              <td class="text-center" v-if="evaluation.loyalty == 4">C</td>
              <td class="text-center" v-if="evaluation.loyalty == 3">D</td>
              <td class="text-center" v-if="evaluation.loyalty == 2">E</td>
              <td class="text-center" v-if="evaluation.loyalty == 1">F</td>
              <td class="text-center" v-if="!evaluation.loyalty == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td class="text-left">Honesty</td>
              <td class="text-center" v-if="evaluation.honesty == 6">A</td>
              <td class="text-center" v-if="evaluation.honesty == 5">B</td>
              <td class="text-center" v-if="evaluation.honesty == 4">C</td>
              <td class="text-center" v-if="evaluation.honesty == 3">D</td>
              <td class="text-center" v-if="evaluation.honesty == 2">E</td>
              <td class="text-center" v-if="evaluation.honesty == 1">F</td>
              <td class="text-center" v-if="!evaluation.honesty == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td class="text-left">Reliability under pressure</td>
              <td class="text-center" v-if="evaluation.reliability == 6">A</td>
              <td class="text-center" v-if="evaluation.reliability == 5">B</td>
              <td class="text-center" v-if="evaluation.reliability == 4">C</td>
              <td class="text-center" v-if="evaluation.reliability == 3">D</td>
              <td class="text-center" v-if="evaluation.reliability == 2">E</td>
              <td class="text-center" v-if="evaluation.reliability == 1">F</td>
              <td class="text-center" v-if="!evaluation.reliability == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">e</td>
              <td class="text-left">Sense of responsibility</td>
              <td class="text-center" v-if="evaluation.responsibility == 6">A</td>
              <td class="text-center" v-if="evaluation.responsibility == 5">B</td>
              <td class="text-center" v-if="evaluation.responsibility == 4">C</td>
              <td class="text-center" v-if="evaluation.responsibility == 3">D</td>
              <td class="text-center" v-if="evaluation.responsibility == 2">E</td>
              <td class="text-center" v-if="evaluation.responsibility == 1">F</td>
              <td class="text-center" v-if="!evaluation.responsibility == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">f</td>
              <td class="text-left">Appearance</td>
              <td class="text-center" v-if="evaluation.appearance == 6">A</td>
              <td class="text-center" v-if="evaluation.appearance == 5">B</td>
              <td class="text-center" v-if="evaluation.appearance == 4">C</td>
              <td class="text-center" v-if="evaluation.appearance == 3">D</td>
              <td class="text-center" v-if="evaluation.appearance == 2">E</td>
              <td class="text-center" v-if="evaluation.appearance == 1">F</td>
              <td class="text-center" v-if="!evaluation.appearance == 1">Not Graded</td>
            </tr>
          </table>
        </div>

        <table class="table table-bordered">
          <tbody>
            <tr>
              <td scope="row">Please justify the gradings</td>
              <td>{{evaluation.character_traits_grade_justification}}</td>
            </tr>
          </tbody>
        </table>

        <b>
          <i>(III) Work Habits</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td class="text-center">a</td>
              <td class="text-left">Punctuality at work</td>
              <td class="text-center" v-if="evaluation.punctuality == 6">A</td>
              <td class="text-center" v-if="evaluation.punctuality == 5">B</td>
              <td class="text-center" v-if="evaluation.punctuality == 4">C</td>
              <td class="text-center" v-if="evaluation.punctuality == 3">D</td>
              <td class="text-center" v-if="evaluation.punctuality == 2">E</td>
              <td class="text-center" v-if="evaluation.punctuality == 1">F</td>
              <td class="text-center" v-if="!evaluation.punctuality == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td class="text-left">Attednace at work</td>
              <td class="text-center" v-if="evaluation.attendance == 6">A</td>
              <td class="text-center" v-if="evaluation.attendance == 5">B</td>
              <td class="text-center" v-if="evaluation.attendance == 4">C</td>
              <td class="text-center" v-if="evaluation.attendance == 3">D</td>
              <td class="text-center" v-if="evaluation.attendance == 2">E</td>
              <td class="text-center" v-if="evaluation.attendance == 1">F</td>
              <td class="text-center" v-if="!evaluation.attendance == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td class="text-left">Drive and Determination</td>
              <td class="text-center" v-if="evaluation.determination == 6">A</td>
              <td class="text-center" v-if="evaluation.determination == 5">B</td>
              <td class="text-center" v-if="evaluation.determination == 4">C</td>
              <td class="text-center" v-if="evaluation.determination == 3">D</td>
              <td class="text-center" v-if="evaluation.determination == 2">E</td>
              <td class="text-center" v-if="evaluation.determination == 1">F</td>
              <td class="text-center" v-if="!evaluation.determination == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td class="text-left">Resource Utilisation</td>
              <td class="text-center" v-if="evaluation.resource_utilization == 6">A</td>
              <td class="text-center" v-if="evaluation.resource_utilization == 5">B</td>
              <td class="text-center" v-if="evaluation.resource_utilization == 4">C</td>
              <td class="text-center" v-if="evaluation.resource_utilization == 3">D</td>
              <td class="text-center" v-if="evaluation.resource_utilization == 2">E</td>
              <td class="text-center" v-if="evaluation.resource_utilization == 1">F</td>
              <td class="text-center" v-if="!evaluation.resource_utilization == 1">Not Graded</td>
            </tr>
          </table>
        </div>

        <div class="form-group row">
          <label for="department" class="col-sm-12 col-form-label">Please justify the gradings</label>
          <div class="col-sm-12">
            <div class="card border-secondary">
              <div class="card-body">
                <p class="card-text">{{evaluation.work_habit_grade_justification}}</p>
              </div>
            </div>
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
            <div class="card border-secondary">
              <div class="card-body">
                <p class="card-text">{{evaluation.sanctions}}</p>
              </div>
            </div>
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
            <div class="card border-secondary">
              <div class="card-body">
                <p class="card-text">{{evaluation.reward}}</p>
              </div>
            </div>
          </div>
        </div>

        <b>
          <i>(IV) Leadership Attainment</i>
        </b>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <td class="text-center">a</td>
              <td
                class="text-left"
              >Does he/she encourage his/her subordinates to define agreed standards and measures for effectiveness beore hand?</td>
              <td class="text-center" v-if="evaluation.define_agreed == 6">A</td>
              <td class="text-center" v-if="evaluation.define_agreed == 5">B</td>
              <td class="text-center" v-if="evaluation.define_agreed == 4">C</td>
              <td class="text-center" v-if="evaluation.define_agreed == 3">D</td>
              <td class="text-center" v-if="evaluation.define_agreed == 2">E</td>
              <td class="text-center" v-if="evaluation.define_agreed == 1">F</td>
              <td class="text-center" v-if="!evaluation.define_agreed == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">b</td>
              <td
                class="text-left"
              >Does he/she encourage and train his/her subordinates to avoid late assessment of goal?</td>
              <td class="text-center" v-if="evaluation.avoid_late_assessment == 6">A</td>
              <td class="text-center" v-if="evaluation.avoid_late_assessment == 5">B</td>
              <td class="text-center" v-if="evaluation.avoid_late_assessment == 4">C</td>
              <td class="text-center" v-if="evaluation.avoid_late_assessment == 3">D</td>
              <td class="text-center" v-if="evaluation.avoid_late_assessment == 2">E</td>
              <td class="text-center" v-if="evaluation.avoid_late_assessment == 1">F</td>
              <td class="text-center" v-if="!evaluation.avoid_late_assessment == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">c</td>
              <td
                class="text-left"
              >Does he/she show good examples of punctuality, efficiency and high degree of responsibility in whatever he/she does?</td>
              <td class="text-center" v-if="evaluation.show_good_examples == 6">A</td>
              <td class="text-center" v-if="evaluation.show_good_examples == 5">B</td>
              <td class="text-center" v-if="evaluation.show_good_examples == 4">C</td>
              <td class="text-center" v-if="evaluation.show_good_examples == 3">D</td>
              <td class="text-center" v-if="evaluation.show_good_examples == 2">E</td>
              <td class="text-center" v-if="evaluation.show_good_examples == 1">F</td>
              <td class="text-center" v-if="!evaluation.show_good_examples == 1">Not Graded</td>
            </tr>
            <tr>
              <td class="text-center">d</td>
              <td
                class="text-left"
              >Does he/she make suggestion for changes/adjustment methods/procedures that ssignificantly contributes to his own work or that of any associate/subordinate?</td>
              <td class="text-center" v-if="evaluation.suggestion_for_changes == 6">A</td>
              <td class="text-center" v-if="evaluation.suggestion_for_changes == 5">B</td>
              <td class="text-center" v-if="evaluation.suggestion_for_changes == 4">C</td>
              <td class="text-center" v-if="evaluation.suggestion_for_changes == 3">D</td>
              <td class="text-center" v-if="evaluation.suggestion_for_changes == 2">E</td>
              <td class="text-center" v-if="evaluation.suggestion_for_changes == 1">F</td>
              <td class="text-center" v-if="!evaluation.suggestion_for_changes == 1">Not Graded</td>
            </tr>
          </table>
        </div>

        
        <h6 class="text-primary">
        <b>
          11. Overall Assessment
        </b></h6>
        <p>From the above assessment, indicate the overall performance of his/her duties by ticking the appropriate box below</p>
        <div class="table-responsive" v-if="evaluation.overall_assessment">
          <table class="table table-bordered">
            <tr v-if="evaluation.overall_assessment == 'outstanding'">
              <td class="text-left">A</td>
              <td
                class="text-left"
              >An exceptionally valuable member of staff, performance well above the required standard for the job</td>
              <td class="text-center">Outstanding</td>
            </tr>
            <tr v-if="evaluation.overall_assessment == 'very_good'">
              <td class="text-left">B</td>
              <td
                class="text-left"
              >Displays good all round level of effectiveness; performance meets requirements in all important task</td>
              <td class="text-center">Very Good</td>
            </tr>
            <tr v-if="evaluation.overall_assessment == 'good'">
              <td class="text-left">C</td>
              <td
                class="text-left"
              >A competent member of the staff, generally achieves the standard required</td>
              <td class="text-center">Good</td>
            </tr>
            <tr v-if="evaluation.overall_assessment == 'fair'">
              <td class="text-left">D</td>
              <td
                class="text-left"
              >Completes all assignments fairly satisfactorily within agreed date</td>
              <td class="text-center">Fair</td>
            </tr>
            <tr v-if="evaluation.overall_assessment == 'poor'">
              <td class="text-left">E</td>
              <td
                class="text-left"
              >Performance does not always reach the required standard; room for improvement</td>
              <td class="text-center">Poor</td>
            </tr>
            <tr v-if="evaluation.overall_assessment == 'very_poor'">
              <td class="text-left">F</td>
              <td class="text-left">Performance does not meet required standard</td>
              <td class="text-center">Very Poor</td>
            </tr>
          </table>
        </div>
        <div v-else>
          <div class="card border-secondary">
            <div class="card-body">
              <p class="card-text">Not Graded</p>
            </div>
          </div>
        </div>
        <br>

        
        <h6 class="text-primary">
        <b>
          12. Training Needs
        </b></h6>
        <p>Indicate training needs necessary to improve the performance or potential of the officer:</p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="text-left">Training Need</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(training, index) in evaluation.training_needs" :key="index">
                <td scope="row">{{training.training_need}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <small v-if="errors.training_needs" class="text-danger">{{ errors.training_needs[0] }}</small>

        
        <h6 class="text-primary">
        <b>
          13. General Remarks
        </b></h6>
        <div class="form-group row">
          <label
            for="department"
            class="col-sm-12 col-form-label"
          >Please provide any additional relevant information here drawing attention to any particular strnght or weaknesses and indicate special aptitudes (if any) demonstrated by the officer:</label>
          <div class="col-sm-12">
            <div class="card border-secondary">
              <div class="card-body">
                <p class="card-text">{{evaluation.general_remarks}}</p>
              </div>
            </div>
          </div>
        </div>

        
        <h6 class="text-primary">
        <b>
          14. Do you suggest the officer for
        </b></h6>
        <div class="row">
          <div class="col-md-12">(A) A different job in thesame grade?</div>
          <div class="col-md-12">
            <div class="card border-secondary">
              <div class="card-body">
                <p class="card-text">{{evaluation.different_job}}</p>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div
            class="col-md-12"
          >(B) Transfer to a job at a similar level in another occupational group or cadre?</div>
          <div class="col-md-12">
            <div class="card border-secondary">
              <div class="card-body">
                <p class="card-text">{{evaluation.transfer_job}}</p>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div
            class="col-12"
          >If you have answered YES to either question, say which kind of job and give reasons below:</div>
          <div class="col-12">
            <div class="card border-secondary">
              <div class="card-body">
                <p class="card-text">{{evaluation.reason_for_different_transfer_job}}</p>
              </div>
            </div>
          </div>
        </div>
        <br>

        <h6 class="text-primary">
        <b>
          15. Promotability
        </b></h6>
        <div class="table-responsive" v-if="evaluation.promotability">
          <table class="table table-bordered">
            <tr v-if="evaluation.promotability == 'exceptional'">
              <td class="text-left">A</td>
              <td>Exceptionally well qualified the officer already seems likely to stand out in the next higher post</td>
            </tr>
            <tr v-if="evaluation.promotability.ready">
              <td class="text-left">B</td>
              <td>Ready for promotion</td>
            </tr>
            <tr v-if="evaluation.promotability == 'potentials'">
              <td class="text-left">C</td>
              <td>Has promotion potentials; has completed the required number of years</td>
            </tr>
            <tr v-if="evaluation.promotability == 'not_ripe'">
              <td class="text-left">D</td>
              <td>Not yet ripe for promotion (for non-fulfilement of conditions prescribed for promotion in line with the Guidelines on civil Service Reforms)</td>
            </tr>
            <tr v-if="evaluation.promotability == 'no_evidence'">
              <td class="text-left">E</td>
              <td>No evidence of promotion potentials at present</td>
            </tr>
            <tr v-if="evaluation.promotability == 'reached_capacity'">
              <td class="text-left">F</td>
              <td>Unlikely to qualify as he/she seems to have reached the limit of his/her capacity</td>
            </tr>
          </table>
        </div>
        <div v-else>
          <div class="card border-secondary">
            <div class="card-body">
              <p class="card-text">Not Graded</p>
            </div>
          </div>
        </div>
        <hr>
        <div v-if="isAccepted == 0">
            <h5 class="text-danger">DECLARATION</h5>
        <p>I certify that I have seen the content of this Report and that the reporting officer has discussed them with me. I have the following comments to make (if no comments, indicate so hereunder)</p>
        <p>
          <textarea
            v-model="evaluation.delaration_comments"
            class="form-control"
            cols="30"
            rows="5"
            required
          ></textarea>
          <small
            v-if="errors.delaration_comments"
            class="text-danger"
          >{{ errors.delaration_comments[0] }}</small>
        </p>
        <p>
          <input type="checkbox" v-model="evaluation.is_accepted" required> I
          <b>{{staff.full_name}}</b> hereby accept this evaluation to be a true reflection of my performance for the period under review.
          <b>[Date: {{currentDate}}]</b>
          <br>
          <small v-if="errors.is_accepted" class="text-danger">{{ errors.is_accepted[0] }}</small>
        </p>
        </div>
        <div v-else>
            <p>
                <h6><b>DECLARATION</b></h6>
                <div class="card border-secondary">
                  <div class="card-body">
                    <p class="card-text">{{evaluation.aper_form.delaration_comments}}</p>
                  </div>
                </div>
            </p>
        </div>
      </div>
    </div>

    <hr>
    <div class="row text-center">
      <div class="col-md-12">
        <button @click="acceptEvaluation" class="btn btn-primary btn-sm">Accept this Evaluation</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AperFormAcceptEvaluation",
  props: {
    staff_id: {
      required: true
    },
    aper_form_id: {
      required: true
    }
  },
  data() {
    return {
      staff: null,
      evaluation: {
          is_finalized: false,
        is_accepted: false,
        delaration_comments: null,
        aper_form_id: null,
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
      training_needs: [{ training_need: "" }],
      errors: [],
      isAccepted: 0
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

    acceptEvaluation() {
     const confirmation = confirm("Are you sure? This action is irreversable.");

      if (!confirmation) {
        return;
      }

      axios
        .post(
          `aper-forms/${this.aper_form_id}/acceptAperEvaluation`,
          this.evaluation
        )
        .then(res => {
          console.log(res.data);
            this.isAccepted = res.data.evaluation.is_accepted;
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
          if (e.response.status == 422) {
            this.errors = e.response.data.errors;
            Vue.toasted.error("NOTE: All fields are required.");
          }
        });
    },

    getData() {
      axios
        .get(`staff/${this.staff_id}`)
        .then(res => {
        //   console.log(res.data);
          this.staff = res.data.staff;
        })
        .catch(e => {
          console.log(e);
        });

      axios
        .get(`aper-forms/${this.aper_form_id}/evaluate`)
        .then(res => {
            // console.log(res.data);
          // this.evaluation.aper_form_id = res.data.aper_form_id

          if (res.data.evaluation) {
            this.evaluation = res.data.evaluation;
            this.isAccepted = res.data.evaluation.aper_form.is_accepted;
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
    console.log("Evaluation Acceptance Component Loaded.");

    this.evaluation.aper_form_id = this.aper_form_id;

    this.getData();
  }
};
</script>

<style>
</style>
