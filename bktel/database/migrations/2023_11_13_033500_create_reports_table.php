<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_to_subject_id');
            $table->string('title');
            $table->string('path');
            $table->integer('mark')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
             // Thêm foreign key
        $table->foreign('student_id')->references('id')->on('students');
        $table->foreign('teacher_to_subject_id')->references('id')->on('teacher_to_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
