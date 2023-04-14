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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('home')->nullable();
            $table->enum('home_status',['1','0']);
            $table->string('academic')->nullable();
            $table->enum('academic_status',['1','0']);
            $table->string('admission')->nullable();
            $table->enum('admission_status',['1','0']);
            $table->string('management')->nullable();
            $table->enum('management_status',['1','0']);
            $table->string('rnd')->nullable();
            $table->enum('rnd_status',['1','0']);
            $table->string('affair')->nullable();
            $table->enum('affair_status',['1','0']);
            $table->string('event')->nullable();
            $table->enum('event_status',['1','0']);
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
        Schema::dropIfExists('menus');
    }
};
