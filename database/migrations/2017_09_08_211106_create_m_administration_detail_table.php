<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMAdministrationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_administration_detail', function (Blueprint $table) {
            $table->bigIncrements('administration_detail_id');
            $table->bigInteger('administration_id');
            $table->string('administration_status',50);
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
        Schema::drop('m_administration_detail');
    }
}
