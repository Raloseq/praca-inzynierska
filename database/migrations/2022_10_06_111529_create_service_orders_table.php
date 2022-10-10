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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('admission_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_done')->default(0);
            $table->string('description',255);
            $table->decimal('price');
            $table->string('damage_photo',255)->nullable();
            $table->unsignedBigInteger('car_id')->index();
            $table->foreign('car_id')
              ->references('id')->on('cars');
            $table->unsignedBigInteger('employee_id')->index();
            $table->foreign('employee_id')
                ->references('id')->on('employee');
            $table->unsignedBigInteger('client_id')->index();
            $table->foreign('client_id')
              ->references('id')->on('clients');
            $table->unsignedBigInteger('user_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_orders');
    }
};
