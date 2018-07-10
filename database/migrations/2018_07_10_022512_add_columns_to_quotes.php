<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->decimal('consumption', 8, 2)->nullable();
            $table->decimal('new_usage', 12, 0)->nullable();
            $table->decimal('exported', 15, 2)->nullable();
            $table->decimal('new_bill', 15, 2)->nullable();
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
            $table->dropColumn('consumption');
            $table->dropColumn('new_usage');
            $table->dropColumn('exported');
            $table->dropColumn('new_bill');
        });
    }
}
