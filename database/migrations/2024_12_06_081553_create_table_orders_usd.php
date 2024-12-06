<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersUsd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_usd', function (Blueprint $table) {
            $table->string('id', 255);
            $table->string('name', 255);
            $table->jsonb('address');
            $table->decimal('price', $precision = 10, $scale = 2);
            $table->char('currency', 3);
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_usd');
    }
}
