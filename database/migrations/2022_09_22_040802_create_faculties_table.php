<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_id');
            $table->string('program_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('designation');
            $table->integer('position');
            $table->string('from');
            $table->enum('status', ['1', '0']);
            $table->longText('desc')->nullable();
            $table->string('img');
            $table->longText('publication')->nullable();
            $table->longText('achievements')->nullable();
            $table->timestamps();
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
};
