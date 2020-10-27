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
            $table->integer('order_id', true);
            $table->float('prices', 10, 0)->nullable();
            $table->float('shipping', 10, 0)->nullable();
            $table->float('total', 10, 0)->nullable();
            $table->text('admin_desc')->nullable();
            $table->enum('order_status', ['pending', 'confirm', 'follow_up', 'done', 'cansel'])->default('pending');
            $table->date('date_shipping')->nullable();
            $table->boolean('collectible')->default(0);
            $table->date('date_collectible')->nullable();
            $table->string('customer_name', 400)->nullable();
            $table->string('customer_phone', 30)->nullable();
            $table->string('cutomer_email', 300)->nullable();
            $table->text('customer_address')->nullable();
            $table->string('city', 150)->nullable();
            $table->text('notes')->nullable();
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
