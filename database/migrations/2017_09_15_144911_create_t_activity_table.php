<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTactivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_activity', function (Blueprint $table) {
            $table->bigIncrements('activity_id');
            $table->bigInteger('job_apply_id');
            $table->string('pic_name',50);
            $table->string('flg_contacted_via',20);
            $table->string('activity_datetime',8);
            $table->text('activity_description');
            $table->text('activity_location');
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
         Schema::drop('t_activity');
    }
}
