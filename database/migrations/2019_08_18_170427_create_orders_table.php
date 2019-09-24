<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('order_no');
            $table->date('order_date');
            $table->string('order_receiver_name');
            $table->text('order-receiver_adress');
            $table->decimal('order_total_before_tax');
            $table->decimal('order_tax1');
            $table->decimal('order_tax2');
            $table->decimal('order_tax3');
            $table->decimal('order_total_tax');
            $table->decimal('order_total_after_tax');
            $table->timestamp('order_datetime');
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
