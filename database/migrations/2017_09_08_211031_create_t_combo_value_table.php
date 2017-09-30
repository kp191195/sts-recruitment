<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTComboValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_combo_value', function (Blueprint $table) {
            $table->bigIncrements('combo_value_id');
            $table->bigInteger('combo_id');
            $table->string('sort_no',20);
            $table->string('key',100);
            $table->string('value',100);
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
        Schema::drop('t_combo_value');
    }
}
