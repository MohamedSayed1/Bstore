<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('product_id', true);
            $table->string('name', 300)->nullable();
            $table->integer('cat_id')->nullable()->index('cate_id');
            $table->string('caver', 300)->nullable();
            $table->integer('count')->nullable();
            $table->float('purchase_price', 10, 0)->nullable();
            $table->float('sale_price', 10, 0)->nullable();
            $table->float('discount', 10, 0)->nullable();
            $table->text('descriaption')->nullable();
            $table->string('brand', 100)->nullable();
            $table->string('color', 100)->nullable();
            $table->string('preif_decs', 50)->nullable();
            $table->string('size', 60)->nullable();
            $table->float('hight', 10, 0)->nullable();
            $table->float('width', 10, 0)->nullable();
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
        Schema::dropIfExists('products');
    }
}
