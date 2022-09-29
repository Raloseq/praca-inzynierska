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
            $table->string('imie', 30)->default('')->change();
            $table->string('nazwisko', 30)->default('')->change();
            $table->string('nr_telefonu',9)->default('')->change();
            $table->string('email',30)->default('')->change();
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
            $table->string('imie', 30);
            $table->string('nazwisko', 30);
            $table->string('nr_telefonu',9);
            $table->string('email',30);
        });
    }
};
