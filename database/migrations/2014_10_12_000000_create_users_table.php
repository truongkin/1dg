<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('levels_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('api_key')->nullable();
            $table->float('total', 13,4)->default(1000);
            $table->float('total_amount_paid', 13,4)->default(0);
            $table->integer('total_orders')->default(0);
            $table->tinyInteger('role')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
