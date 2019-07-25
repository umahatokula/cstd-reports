<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyPerformanceEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_performance_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->string('full_name');
            $table->integer('title')->nullable();
            $table->integer('grade_level_id')->nullable();
            $table->integer('appraisee');
            $table->integer('department_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('comment')->nullable();
            $table->text('rating')->nullable();
            $table->string('punctuality')->nullable();
            $table->string('availability')->nullable();
            $table->string('general_conduct')->nullable();
            $table->text('interpersonal_intellectual')->nullable();
            $table->text('recommendation')->nullable();
            $table->text('general_remark')->nullable();
            $table->integer('reporting_officer')->nullable();
            $table->integer('evaluating_officer')->nullable();
            $table->boolean('is_evaluated')->default(0);
            $table->integer('countersigning_officer')->nullable();
            $table->boolean('is_counter_signed')->default(0);
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
        Schema::dropIfExists('monthly_performance_evaluations');
    }
}
