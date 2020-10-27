<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_order', function (Blueprint $table) {
            $table->integer('details_id', true);
            $table->integer('prod_id')->nullable()->index('product_and_detais');
            $table->integer('order_id')->nullable()->index('order_and_detais');
            $table->integer('quantity')->nullable();
            $table->float('prices', 10, 0)->nullable();
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
        Schema::dropIfExists('products_order');
    }
}
