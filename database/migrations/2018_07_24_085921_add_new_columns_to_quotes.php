<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->boolean('is_related')->default(false);
            $table->integer('plan_to_install')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->boolean('tnc')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('is_related');
            $table->dropColumn('plan_to_install');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('tnc');
        });
    }
}
