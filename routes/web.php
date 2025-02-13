<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['verify.shopify'])->group( function () {

    Route::get('/', function () {
        return view('welcome');
    });

});

