<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('students', function (Blueprint $table) {
            $table->string('id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('student_code');
            $table->string('email');
            $table->string('department');
            $table->string('faculty');
            $table->string('address');
            $table->string('phone');
            $table->string('note');
            $table->string('user_id');
            // $table->string('student_id');
            $table->foreignId('student_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
          
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('students');
    }
}
