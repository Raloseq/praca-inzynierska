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
        Schema::table('model', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->index();
            $table->foreign('brand_id')
              ->references('id')->on('brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('model', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->index();
            $table->foreign('brand_id')
              ->references('id')->on('brand')->onDelete('cascade');
        });
    }
};
