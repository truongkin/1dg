<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_id');
            $table->integer('services_id');
            $table->string('link');
            $table->bigInteger('amount');
            $table->bigInteger('amount_start');
            $table->float('price_service',13,4);
            $table->float('refund',13,4);
            $table->bigInteger('amount_com');
            $table->integer('status');
            $table->string('services_name');
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
        Schema::dropIfExists('detail_orders');
    }
}
