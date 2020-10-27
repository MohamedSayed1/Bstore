<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductsOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_order', function (Blueprint $table) {
            $table->foreign('order_id', 'order_and_detais')->references('order_id')->on('orders')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('prod_id', 'product_and_detais')->references('product_id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_order', function (Blueprint $table) {
            $table->dropForeign('order_and_detais');
            $table->dropForeign('product_and_detais');
        });
    }
}
