<?php

namespace stefanoregis\woocommercetolaravel\Console\Commands;
use Automattic\WooCommerce\Client;
use Carbon\Carbon;
use Illuminate\Console\Command;

use stefanoregis\woocommercetolaravel\Models\WoocommerceOrder;
use stefanoregis\woocommercetolaravel\Models\WoocommerceOrderProduct;

class WoocommerceToLaravelCommand extends Command
{

    protected $signature = 'woocommercetolaravel:import';

    protected $description = 'Import orders from woocommerce  to laravel';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {


        $woocommerce = new Client(
            config('woocommercetolaravel.url'),
            config('woocommercetolaravel.key'),
            config('woocommercetolaravel.secret'),
            [
                config('woocommerce_api.version'),
            ]
        );

        try{
            $woocommerce->get('orders', ["after" => $this->getStartDateIso(), "page" => 1, "per_page" => 100]);
            $lastResponse = $woocommerce->http->getResponse();

            $arrHeaders = $lastResponse->getHeaders();

        }catch(\Exception $e){

    }
        /**
         * Todo
         */
        for ($i = 1; $i <= $arrHeaders["x-wp-totalpages"]; $i++) {
            /*
         * Recupero tutti gli ordini a partire da 7 giorni
         */
            $results = $woocommerce->get('orders', ["after" => $this->getStartDateIso(), "page" => $i, "per_page" => 100]);

            foreach ($results as $result) {


                $woo = WoocommerceOrder::firstOrNew(['orderId' => $result->id]);

                $woo->saveFromJson($result);

                foreach ($result->line_items as $item) {
                    $wooP = WoocommerceOrderProduct::firstOrNew(['woocommerceId' => $item->id]);
                    $wooP->saveFromJson($item, $result->id, $woo->id);
                }
            }


        }

    }



    public function getStartDateIso()
    {

        $days = 30;


        $dt = Carbon::now()->subDays($days);
        $dateIso = $dt->toIso8601String();


        return $dateIso;

    }


}
