<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Trường name
            $table->string('path'); // Trường path (đường dẫn tới file)
            $table->tinyInteger('status')->default(0); // Trường status (0: uploaded)
            $table->unsignedBigInteger('created_by'); // Trường created_by (người tạo import)
            $table->text('note')->nullable(); // Trường note
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users'); // Khóa ngoại đến bảng "users"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imports');
    }
}
