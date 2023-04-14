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
        Schema::create('customizes', function (Blueprint $table) {
            $table->id();
            $table->enum('academics',['1','0']);
            $table->enum('admission',['1','0']);
            $table->enum('management',['1','0']);
            $table->enum('seminar',['1','0']);
            $table->enum('notice',['1','0']);
            $table->enum('social_page',['1','0']);
            $table->enum('news_event',['1','0']);
            $table->enum('counter',['1','0']);
            $table->enum('gallery',['1','0']);
            $table->enum('clubs',['1','0']);
            $table->enum('partner',['1','0']);
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
        Schema::dropIfExists('customizes');
    }
};
