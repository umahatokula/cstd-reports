<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAPEREvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_p_e_r_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aper_form_id')->nullable();
            $table->string('agree_on_targets')->nullable();
            $table->string('agree_on_duties')->nullable();
            $table->integer('understands_job')->nullable();
            $table->integer('applied_knowledge')->nullable();
            $table->integer('accomplish_in_timeframe')->nullable();
            $table->integer('relevant_judgement')->nullable();
            $table->integer('work_speed')->nullable();
            $table->integer('expression_on_paper')->nullable();
            $table->integer('oral_expression')->nullable();
            $table->integer('relations_with_staff')->nullable();
            $table->integer('relations_with_public')->nullable();
            $table->integer('management_of_staff')->nullable();
            $table->integer('quality_of_work')->nullable();
            $table->integer('productivity')->nullable();
            $table->integer('effective_use_of_figures')->nullable();
            $table->integer('intiative')->nullable();
            $table->string('human_relations_grade_justification')->nullable();
            $table->integer('dependability')->nullable();
            $table->integer('loyalty')->nullable();
            $table->integer('honesty')->nullable();
            $table->integer('reliability')->nullable();
            $table->integer('responsibility')->nullable();
            $table->integer('appearance')->nullable();
            $table->string('character_traits_grade_justification')->nullable();
            $table->integer('punctuality')->nullable();
            $table->integer('attendance')->nullable();
            $table->integer('determination')->nullable();
            $table->integer('resource_utilization')->nullable();
            $table->string('work_habit_grade_justification')->nullable();
            $table->string('sanctions')->nullable();
            $table->string('reward')->nullable();
            $table->string('define_agreed')->nullable();
            $table->string('avoid_late_assessment')->nullable();
            $table->string('show_good_examples')->nullable();
            $table->string('suggestion_for_changes')->nullable();
            $table->string('overall_assessment')->nullable();
            $table->text('general_remarks')->nullable();
            $table->string('different_job')->nullable();
            $table->string('transfer_job')->nullable();
            $table->string('reason_for_different_transfer_job')->nullable();
            $table->string('promotability')->nullable();

            $table->string('declaration_by_staff')->nullable();
            $table->string('declaration_by_reporting_officer')->nullable();
            $table->string('declaration_by_countersigning_officer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_p_e_r_evaluations');
    }
}
