<?php


Route::get('/woocommercewbsites/grid', 'WoocommercewbsitesController@grid');
Route::resource('/woocommercewbsites', 'WoocommercewbsitesController');

?>