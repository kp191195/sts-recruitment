<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMPersonIdcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_person_idcard', function (Blueprint $table) {
            $table->bigIncrements('person_idcard_id');
            $table->bigInteger('card_id');
            $table->string('card_type');
            $table->string('card_no');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('exp_date');
            $table->bigInteger('create_user_id');
            $table->string('create_date_time');
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
        Schema::drop('m_person_idcard');
    }
}
