<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPersonProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_person_profile', function (Blueprint $table) {
            $table->bigIncrements('person_id');
            $table->string('prefix_title',20);
            $table->string('name',100);
            $table->string('sufix_title',20);
            $table->string('pob',50);
            $table->string('dob',8);
            $table->string('religion',10);
            $table->string('marital_status',50);
            $table->string('sex',10);
            $table->string('blood_type',10);
            $table->string('email',100);
            $table->string('mobile_no',20);
            $table->string('current_address');
            $table->string('city',50);
            $table->string('province',100);
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
        Schema::drop('m_person_profile');
    }
}
