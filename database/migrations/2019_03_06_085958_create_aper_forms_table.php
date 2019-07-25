<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAperFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aper_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('current_form_page')->default(1);
            $table->boolean('is_submitted')->default(0);
            $table->boolean('is_accepted')->default(0);
            $table->boolean('is_evaluated')->default(0);
            $table->boolean('is_finalized')->default(0);
            $table->string('year')->nullable();
            $table->integer('staff_id');
            $table->date('from');
            $table->date('to');
            $table->integer('department_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->date('dob')->nullable();
            $table->date('date_of_first_appointment')->nullable();
            $table->string('post_first_appointed')->nullable();
            $table->date('date_of_confirmation')->nullable();
            $table->string('present_substantive_post')->nullable();
            $table->date('date_appointed_to_substantive_post')->nullable();
            $table->integer('grade_level_id')->nullable();
            $table->double('salary_per_annum', 15, 8)->nullable();
            $table->date('date_of_next_increment')->nullable();
            $table->date('date_of_acting_appointment')->nullable();
            $table->string('hospital_leave_from')->nullable();
            $table->string('hospital_leave_to')->nullable();
            $table->string('hospital_leave_days')->nullable();
            $table->string('abroad_treatment_leave_from')->nullable();
            $table->string('abroad_treatment_leave_to')->nullable();
            $table->string('abroad_leave_days')->nullable();
            $table->string('sick_leave_from')->nullable();
            $table->string('sick_leave_to')->nullable();
            $table->string('sick_leave_days')->nullable();
            $table->string('maternity_leave_from')->nullable();
            $table->string('maternity_leave_to')->nullable();
            $table->string('maternity_leave_days')->nullable();
            $table->string('annual_leave_from')->nullable();
            $table->string('annual_leave_to')->nullable();
            $table->string('annual_leave_days')->nullable();
            $table->string('casual_leave_from')->nullable();
            $table->string('casual_leave_to')->nullable();
            $table->string('casual_leave_days')->nullable();

            $table->double('project_cost', 15, 8)->nullable();
            $table->string('project_completion_time')->nullable();
            $table->string('quantity_conformity')->nullable();
            $table->string('completed_standard')->nullable();
            $table->string('joint_discussion_with_supervisor')->nullable();
            $table->string('properly_equiped')->nullable();
            $table->string('dificulty_encountered')->nullable();
            $table->string('methods_to_rectify')->nullable();
            $table->string('periodic_reviews')->nullable();
            $table->string('did_performance_measure_up')->nullable();
            $table->string('shortcoming_solution_admonition')->nullable();
            $table->string('final_evaluation')->nullable();
            $table->string('ad_hoc_duties')->nullable();
            $table->string('ad_hoc_performance')->nullable();
            $table->string('schedule_from')->nullable();
            $table->string('schedule_to')->nullable();
            $table->integer('served_under_reporting_officer')->nullable();
            $table->string('served_under_reporting_officer_from')->nullable();
            $table->string('served_under_reporting_officer_to')->nullable();
            $table->integer('served_under_countersigning_officer')->nullable();
            $table->string('served_under_countersigning_officer_from')->nullable();
            $table->string('served_under_countersigning_officer_to')->nullable();
            $table->integer('served_under_hod')->nullable();
            $table->string('served_under_hod_from')->nullable();
            $table->string('served_under_hod_to')->nullable();
            $table->string('training_enhanced_productivity')->nullable();
            $table->string('satisfactory_tasks')->nullable();
            $table->string('causes_success_failure')->nullable();
            $table->string('more_training')->nullable();
            $table->string('most_effective_use')->nullable();
            $table->string('abilities_better_used')->nullable();
            $table->string('had_job_satisfaction')->nullable();
            $table->text('other_comments')->nullable();
            $table->text('delaration_comments')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('aper_forms');
    }
}
