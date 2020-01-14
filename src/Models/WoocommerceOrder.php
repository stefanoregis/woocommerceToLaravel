<?php
// MyVendor\Contactform\src\Models\ContactForm.php
namespace stefanoregis\woocommercetolaravel\Models;

use Illuminate\Database\Eloquent\Model;

class WoocommerceOrder extends Model
{
    protected $guarded = [];
    protected $table = 'woocommerce_orders';



    public function saveFromJson($result)
    {


        $this->orderId = $result->id;

        $this->parent_id = $result->parent_id;
        $this->number = $result->number;
        $this->order_key = $result->order_key;
        $this->created_via = $result->created_via;
        $this->version = $result->version;
        $this->status = $result->status;
        $this->currency = $result->currency;
        $this->date_created = $result->date_created;
        $this->date_created_gmt = $result->date_created_gmt;
        $this->date_modified = $result->date_modified;
        $this->date_modified_gmt = $result->date_modified_gmt;
        $this->discount_total = $result->discount_total;
        $this->discount_tax = $result->discount_tax;
        $this->shipping_total = $result->shipping_total;
        $this->shipping_tax = $result->shipping_tax;
        $this->cart_tax = $result->cart_tax;
        $this->total = $result->total;
        $this->total_tax = $result->total_tax;
        $this->prices_include_tax = $result->prices_include_tax;
        $this->customer_id = $result->customer_id;
        $this->customer_ip_address = $result->customer_ip_address;
        $this->customer_user_agent = $result->customer_user_agent;
        $this->customer_note = $result->customer_note;
        $this->billing_first_name = $result->billing->first_name;
        $this->billing_last_name = $result->billing->last_name;
        $this->billing_company = $result->billing->company;
        $this->billing_address_1 = $result->billing->address_1;
        $this->billing_address_2 = $result->billing->address_2;
        $this->billing_city = $result->billing->city;
        $this->billing_state = $result->billing->state;
        $this->billing_postcode = $result->billing->postcode;
        $this->billing_country = $result->billing->country;
        $this->billing_email = $result->billing->email;
        $this->billing_phone = $result->billing->phone;
        $this->shipping_first_name = $result->shipping->first_name;
        $this->shipping_last_name = $result->shipping->last_name;
        $this->shipping_company = $result->shipping->company;
        $this->shipping_address_1 = $result->shipping->address_1;
        $this->shipping_address_2 = $result->shipping->address_2;
        $this->shipping_city = $result->shipping->city;
        $this->shipping_state = $result->shipping->state;
        $this->shipping_postcode = $result->shipping->postcode;
        $this->shipping_country = $result->shipping->country;
        $this->payment_method = $result->payment_method;
        $this->payment_method_title = $result->payment_method_title;
        $this->transaction_id = $result->transaction_id;
        $this->date_paid = $result->date_paid;
        $this->date_paid_gmt = $result->date_paid_gmt;
        $this->date_completed = $result->date_completed;
        $this->date_completed_gmt = $result->date_completed_gmt;
        $this->cart_hash = $result->cart_hash;
        if (isset($result->shipping_lines[0])) {
            $this->shipping_id = $result->shipping_lines[0]->id;
            $this->shipping_method_title = $result->shipping_lines[0]->method_title;
        }

        $this->save();
    }

    public function productDataOrder()
    {
        return $this->hasMany('stefanoregis\woocommercetolaravel\Models\WoocommerceOrderProduct', "orderId", 'id');

    }
}