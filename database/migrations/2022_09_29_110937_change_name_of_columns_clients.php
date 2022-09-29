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
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('imie','name');
            $table->renameColumn('nazwisko','surname');
            $table->renameColumn('nazwa_firmy','company_name');
            $table->renameColumn('nr_telefonu','phone');
            $table->renameColumn('id_adres_klienta','id_client_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('name','imie');
            $table->renameColumn('surname','nazwisko');
            $table->renameColumn('company_name','nazwa_firmy');
            $table->renameColumn('phone','nr_telefonu');
            $table->renameColumn('id_client_address','id_adres_klienta');
        });
    }
};
