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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->unsignedInteger('quantity')->default(0);
            $table->text('color');
            $table->text('size');
            $table->double('weight');
            $table->unsignedInteger('price_cents');
            $table->unsignedInteger('sale_price_cents');
            $table->unsignedInteger('cost_cents');
            $table->string('sku');
            $table->double('length');
            $table->double('width');
            $table->double('height');
            $table->text('note');
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
        Schema::dropIfExists('inventories');
    }
};
