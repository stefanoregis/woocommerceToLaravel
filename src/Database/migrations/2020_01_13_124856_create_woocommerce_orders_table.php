<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWoocommerceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('woocommerce_orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('orderId');

            $table->integer('parent_id');
            $table->integer('number');
            $table->string('order_key');
            $table->string('created_via');
            $table->string('version');
            $table->string('status');
            $table->string('currency');
            $table->dateTime('date_created');
            $table->dateTime('date_created_gmt');
            $table->dateTime('date_modified');
            $table->dateTime('date_modified_gmt');
            $table->float('discount_total');
            $table->float('discount_tax');
            $table->float('shipping_total');
            $table->float('shipping_tax');
            $table->float('cart_tax');
            $table->float('total');
            $table->float('total_tax');
            $table->tinyInteger('prices_include_tax');
            $table->integer('customer_id');
            $table->string('customer_ip_address');
            $table->string('customer_user_agent');
            $table->string('customer_note');
            $table->string('billing_first_name');
            $table->string('billing_last_name');

            $table->string('billing_company');
            $table->string('billing_address_1');
            $table->string('billing_address_2');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_postcode');
            $table->string('billing_country');
            $table->string('billing_email');
            $table->string('billing_phone');

            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_company');
            $table->string('shipping_address_1');
            $table->string('shipping_address_2');
            $table->string('shipping_city');
            $table->string('shipping_postcode');
            $table->string('shipping_country');
            $table->string('shipping_state');
            $table->string('shipping_method_title')->nullable();
            $table->integer('shipping_id')->default(0);

            $table->string('payment_method');
            $table->string('payment_method_title');
            $table->string('transaction_id');
            $table->dateTime('date_paid')->nullable();
            $table->dateTime('date_paid_gmt')->nullable();
            $table->dateTime('date_completed')->nullable();
            $table->dateTime('date_completed_gmt')->nullable();

            $table->string('cart_hash');





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
        Schema::dropIfExists('woocommerce_orders');
    }
}
