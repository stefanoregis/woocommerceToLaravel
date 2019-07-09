<?php
$routeConfig = [
    'namespace' => 'stefanoregis\woocommerceToLaravel\controllers',


];

Route::get('/woocommercewbsites/grid', 'WoocommercewbsitesController@grid');
Route::resource('/woocommercewbsites', 'WoocommercewbsitesController');


?>