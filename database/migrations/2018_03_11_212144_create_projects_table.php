<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('installed_capacity');
            $table->string('type_installation');
            $table->string('type_connection');
            $table->string('location');
            $table->boolean('is_location_allow_public')->default(0);
            $table->string('province');
            $table->boolean('is_involved_installation')->default(0);
            $table->string('image');
            // $table->string('brand')->nullable();
            // $table->integer('capacity_panel')->nullable();
            // $table->integer('amount')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
