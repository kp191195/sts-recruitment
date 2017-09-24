<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAdministrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_administration', function (Blueprint $table) {
            $table->bigIncrements('administration_id');
            $table->bigInteger('employee_id');
            $table->string('administration_name');
            $table->string('administration_status',50);
            $table->bigInteger('create_user_id');
            $table->string('create_datetime');
            $table->bigInteger('update_user_id');
            $table->string('update_datetime');
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
        Schema::drop('m_administration');
    }
}
