<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_item_id')->unsigned();
            $table->foreign('order_item_id')->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('cascade');;
            $table->string('item_name');
            $table->decimal('order_item_qty');
            $table->decimal('order_item_price');
            $table->decimal('order_item_actual_amount');
            $table->decimal('oder_item_tax1_rate');
            $table->decimal('order_item_tax1_amount');
            $table->decimal('order_item_tax2_rate');
            $table->decimal('order_item_tax2_amount');
            $table->decimal('order_item_tax3_rate');
            $table->decimal('order_item_tax3_amount');
            $table->decimal('order_item_final_amount');
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
        Schema::dropIfExists('order_items');
    }
}
