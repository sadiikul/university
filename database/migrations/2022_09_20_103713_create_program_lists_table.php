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
        Schema::create('program_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('cate_id');
            $table->string('name');
            $table->string('slug');
            $table->enum('status', ['1', '0']);
            $table->string('thumb');
            $table->longText('desc');
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->longText('meta_desc')->nullable();
            $table->timestamps();
            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('cate_id')->references('id')->on('program_categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_lists');
    }
};
