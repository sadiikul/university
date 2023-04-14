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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_phone_title')->nullable();
            $table->string('second_phone_title')->nullable();
            $table->string('email_title')->nullable();
            $table->string('email')->nullable();
            $table->string('first_phone')->nullable();
            $table->string('second_phone')->nullable();
            $table->string('third_phone')->nullable();
            $table->string('fourth_phone')->nullable();
            $table->string('first_address_title')->nullable();
            $table->string('second_address_title')->nullable();
            $table->string('third_address_title')->nullable();
            $table->longText('first_address')->nullable();
            $table->longText('second_address')->nullable();
            $table->longText('third_address')->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
