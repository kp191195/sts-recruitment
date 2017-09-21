<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFilePathToMApplicantFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_applicant_file', function (Blueprint $table) {
            //
            $table->string('file_path',255)->default(' ');
            $table->string('file_type',255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_applicant_file', function (Blueprint $table) {
            //
            $table->dropColumn(['file_path', 'file_type']);
        });
    }
}
