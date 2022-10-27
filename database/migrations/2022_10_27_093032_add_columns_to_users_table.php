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
        Schema::table('users', function (Blueprint $table) {
            $table->string('city',50);
            $table->string('street',50);
            $table->string('ZIP',6);
            $table->string('NIP', 10);
            $table->string('company_name', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->dropColumn('street');
            $table->dropColumn('ZIP');
            $table->dropColumn('NIP');
            $table->dropColumn('company_name');

        });
    }
};
