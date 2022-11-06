<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->references('id')->on('students');
            $table->string('last_name',100);
            $table->string('first_name',100);
            $table->string('student code');
            $table->string('department',100)-> nullable();
            $table->string('faculty',100)-> nullable();
            $table->string('address',100)-> nullable();
            $table->integer('phone')-> nullable();
            $table->text('note');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
