<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDevelopers2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('developers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('developers', function (Blueprint $table) {
            $table->id();
            $table->text('skills')->nullable();
            $table->text('curriculum')->nullable();
            $table->string('photo', 100)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->string('slug', 130);
        });
    }
}
