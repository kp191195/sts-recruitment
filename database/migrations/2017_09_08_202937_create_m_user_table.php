<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->bigInteger('role_id');
            $table->string('name',100);
            $table->string('email',100);
            $table->string('password',50);
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
        Schema::drop('m_user');
    }
}
