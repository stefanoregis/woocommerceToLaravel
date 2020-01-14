<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWoocommerceOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('woocommerce_orders_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('woocommerceId');
            $table->string('name');
            $table->integer('product_id');
            $table->integer('variation_id');
            $table->integer('quantity');
            $table->string('tax_class');
            $table->float('subtotal');
            $table->float('subtotal_tax');
            $table->float('total');
            $table->float('total_tax');
            $table->string('sku');
            $table->float('price');
            $table->integer('woocommerceOrderId');
            $table->integer('orderId');



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
        Schema::dropIfExists('woocommerce_orders_products');
    }
}
