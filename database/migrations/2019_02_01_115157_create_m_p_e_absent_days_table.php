<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPEAbsentDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_p_e_absent_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('monthly_performance_evaluation_id');
            $table->string('reason');
            $table->boolean('permission');
            $table->integer('no_of_days');
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
        Schema::dropIfExists('m_p_e_absent_days');
    }
}
