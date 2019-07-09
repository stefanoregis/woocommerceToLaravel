<?php


Route::get('/woocommercewbsites/grid', '\stefanoregis\woocommerceToLaravel\WoocommercewbsitesController@grid');
Route::resource('/woocommercewbsites', '\stefanoregis\woocommerceToLaravel\WoocommercewbsitesController');

?>