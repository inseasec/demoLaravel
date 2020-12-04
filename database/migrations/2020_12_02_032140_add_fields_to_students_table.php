<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {

            $table->string('Name');
            $table->string('Email');
            $table->integer('Number');
            $table->string('Pass');
            $table->string('confirm_pass');
            $table->date('Birthday');
            $table->date('Date');
            $table->string('Gender');
            $table->string('hobby');
            $table->string('Courses');
            $table->time('Time');
            $table->integer('pincode');            
            $table->string('country');            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
