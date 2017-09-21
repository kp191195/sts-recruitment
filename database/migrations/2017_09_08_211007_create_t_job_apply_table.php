<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTJobApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_job_apply', function (Blueprint $table) {
            $table->bigIncrements('job_apply_id');
            $table->bigInteger('applicant_id');
            $table->bigInteger('job_id');
            $table->string('apply_date',8);
            $table->string('flg_qualified',1);
            $table->string('flg_accept',1);
            $table->bigInteger('create_user_id');
            $table->string('create_datetime',14);
            $table->bigInteger('update_user_id');
            $table->string('update_datetime',14);
            $table->bigInteger('version')->default(0);
            $table->unique(['applicant_id','job_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t_job_apply');
    }
}
