# Woocommerce to Laravel wrapper
A PHP wrapper for the WooCommerce. Import your orders and products into your Laravel database.

Enable the Api on your woocommerce installation

Install: composer require stefanoregis/woocommercetolaravel


include the provider in app.php:
stefanoregis\woocommercetolaravel\WoocommerceToLaravelServiceProvider::class, 


publish the config file:
php artisan vendor:publish --provider="stefanoregis\woocommercetolaravel\WoocommerceToLaravelServiceProvider"


update the config file with your parameters

migrate the tables

run php artisan woocommercetolaravel:import to import your orders
