<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_employee', function (Blueprint $table) {
            $table->bigIncrements('employee_id');
            $table->bigInteger('person_id');
            $table->bigInteger('job_apply_id');
            $table->bigInteger('job_id');
            $table->bigInteger('user_id');
            $table->string('join_date',8);
            $table->string('start_date',8);
            $table->string('placement',100);
            $table->string('membership',20);
            $table->bigInteger('supervisor_id');
            $table->string('last_date',8);
            $table->bigInteger('create_user_id');
            $table->string('create_datetime',14);
            $table->bigInteger('update_user_id');
            $table->string('update_datetime',14);
            $table->bigInteger('version')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('m_employee');
    }
}
