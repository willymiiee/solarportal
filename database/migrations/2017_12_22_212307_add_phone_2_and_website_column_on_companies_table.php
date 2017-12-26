<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhone2AndWebsiteColumnOnCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('type')->nullable()->change();
            $table->string('domicile')->nullable()->after('email');
            $table->string('phone_2')->nullable()->after('phone');
            $table->string('website')->nullable()->after('phone_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('phone_2');
            $table->dropColumn('website');
        });
    }
}
