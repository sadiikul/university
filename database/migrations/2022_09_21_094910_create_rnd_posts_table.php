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
        Schema::create('rnd_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_id');
            $table->string('title');
            $table->string('slug');
            $table->text('short');
            $table->longText('desc');
            $table->text('topic');
            $table->string('thumb');
            $table->enum('status', ['1', '0']);
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->longText('meta_desc')->nullable();
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
        Schema::dropIfExists('rnd_posts');
    }
};
