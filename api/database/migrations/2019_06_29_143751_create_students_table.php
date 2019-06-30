<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('students_record', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname', 60)->nullable();
            $table->string('lname', 60)->nullable();
            $table->integer('class_id');
            $table->integer('teacher_id');
            $table->string('gender', 20)->nullable();
            $table->string('year', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('students');
    }

}
