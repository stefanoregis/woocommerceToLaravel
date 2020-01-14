# Woocommerce to Laravel wrapper
A PHP wrapper for the WooCommerce. Import your orders and products into your Laravel database.

Install: composer require stefanoregis/woocommercetolaravel


include the provider in app.php:
stefanoregis\woocomemrcetolaravel\WoocommerceToLaravelServiceProvider::class, 


publish the config file:
php artisan vendor:publish --provider="stefanoregis\woocommercetolaravel\WoocommerceToLaravelServiceProvider"
