<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('province_id');
            $table->integer('regency_id');
            $table->decimal('bill', 15, 2);
            $table->string('capacity');
            $table->decimal('use_per_day', 15, 2);
            $table->decimal('pv_required', 6, 0);
            $table->decimal('cost', 15, 2);
            $table->decimal('saving', 15, 2);
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
        Schema::dropIfExists('quotes');
    }
}
