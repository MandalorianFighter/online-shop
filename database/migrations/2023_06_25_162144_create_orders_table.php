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
            $table->string('user_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_id')->nullable();
            $table->float('paying_amount', 10, 2)->nullable();
            $table->string('balance_transaction')->nullable();
            $table->string('order_id')->nullable();
            $table->float('subtotal', 10, 2)->nullable();
            $table->float('shipping', 10, 2)->nullable();
            $table->float('vat', 10, 2)->nullable();
            $table->float('total', 10, 2)->nullable();
            $table->string('status')->nullable()->default(0);
            $table->string('return_order')->nullable()->default(0);
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('year')->nullable();
            $table->string('status_code')->nullable();
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
