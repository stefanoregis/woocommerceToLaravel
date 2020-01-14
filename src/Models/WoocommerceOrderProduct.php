<?php

namespace stefanoregis\woocommercetolaravel\Models;

use Illuminate\Database\Eloquent\Model;

class WoocommerceOrderProduct extends Model
{
    protected $guarded = [];
    protected $table = 'woocommerce_orders_products';




    public function saveFromJson($item, $woocommerceOrderId, $orderId)
    {


        $this->woocommerceId = $item->id;
        $this->name = $item->name;
        $this->product_id = $item->product_id;
        $this->variation_id = $item->variation_id;
        $this->quantity = $item->quantity;
        $this->tax_class = $item->tax_class;
        $this->subtotal = $item->subtotal;
        $this->subtotal_tax = $item->subtotal_tax;
        $this->total = $item->total;
        $this->total_tax = $item->total_tax;
        $this->sku = $item->sku;
        $this->price = $item->price;
        $this->woocommerceOrderId = $woocommerceOrderId;
        $this->orderId = $orderId;

        $this->save();



    }

}