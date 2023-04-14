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
        Schema::create('program_curricula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->longText('desc');
            $table->timestamps();
            $table->foreign('program_id')->references('id')->on('program_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_curricula');
    }
};
