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
        Schema::table('client_addresses', function (Blueprint $table) {
            $table->renameColumn('wojewodztwo','voivodeship');
            $table->renameColumn('miasto','city');
            $table->renameColumn('ulica','street');
            $table->renameColumn('kod_pocztowy','ZIP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::table('client_addresses', function (Blueprint $table) {
        $table->renameColumn('wojewodztwo','voivodeship');
            $table->renameColumn('city','miasto');
            $table->renameColumn('street','ulica');
            $table->renameColumn('ZIP','kod_pocztowy');
    });
    }
};
