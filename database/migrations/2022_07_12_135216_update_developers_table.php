<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('developers', function (Blueprint $table) {
            $table->string('name', 100);
            $table->string('slug', 130);
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
        });
    }
}
