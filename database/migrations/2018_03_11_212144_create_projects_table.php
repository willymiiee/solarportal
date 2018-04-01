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
            $table->integer('installed_capacity')->comment = 'Kapasitas Terpasang (dalam Wp atau Watt Peak)';
            $table->string('type_installation')->comment = 'Jenis Pemasangan';
            $table->string('type_connection')->comment = 'Jenis Koneksi';
            $table->string('location');
            $table->boolean('is_location_allow_public')->default(0);
            $table->string('province');
            $table->boolean('is_involved_installation')->default(0);
            $table->string('image');
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
