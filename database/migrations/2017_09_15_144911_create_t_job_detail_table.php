<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTJobDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_job_apply_detail', function (Blueprint $table) {
            $table->bigIncrements('job_apply_detail_id');
            $table->bigInteger('job_apply_id');
            $table->string('pic_name',50);
            $table->string('flg_contacted_via',20);
            $table->string('meeting_datetime',8);
            $table->string('meeting_location',50);
            $table->text('remark');
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
         Schema::drop('t_job_apply_detail');
    }
}
