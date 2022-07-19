<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->float('total_amount',11,2)->nullable();
            $table->float('subtotal',11,2)->nullable();
            $table->float('shipping_cost',11,2)->nullable();
            $table->integer('weight')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('order_status')->default('pending');
            $table->string('payment_method')->default('cash on delivery');
            $table->string('payment_status')->default('unpaid');
            $table->string('transaction_id')->nullable();
            $table->string('address');
            $table->tinyInteger('hold')->default(0);
            $table->string('receiver_phone');
            $table->string('receiver_first_name');
            $table->string('receiver_last_name');
            $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete();
            $table->foreignId('state_id')->constrained('states')->cascadeOnDelete();
            $table->foreignId('area_id')->constrained('areas')->cascadeOnDelete();
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
}
