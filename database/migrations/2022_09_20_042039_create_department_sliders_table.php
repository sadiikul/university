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
        Schema::create('department_sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_id');
            $table->string('img');
            $table->enum('status',['1','0']);
            $table->enum('show',['1','0'])->default('0');
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
        Schema::dropIfExists('department_sliders');
    }
};
