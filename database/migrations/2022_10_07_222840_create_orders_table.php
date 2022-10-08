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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('inventory_id')->constrained();
            $table->text('street_address');
            $table->text('apartment');
            $table->text('city');
            $table->text('state');
            $table->text('country_code');
            $table->text('zip');
            $table->string('phone_number');
            $table->text('email');
            $table->string('name');
            $table->string('order_status');
            $table->text('payment_ref');
            $table->string('transaction_id');
            $table->unsignedInteger('payment_amt_cents');
            $table->unsignedInteger('ship_charged_cents')->nullable();
            $table->unsignedInteger('ship_cost_cents')->nullable();
            $table->unsignedInteger('subtotal_cents')->nullable();
            $table->unsignedInteger('total_cents')->nullable();
            $table->text('shipper_name');
            $table->dateTime('payment_date');
            $table->dateTime('shipped_date');
            $table->text('tracking_number');
            $table->unsignedInteger('tax_total_cents');
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
        Schema::dropIfExists('orders');
    }
};
