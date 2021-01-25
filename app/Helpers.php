<?php

use Gloudemans\Shoppingcart\Facades\Cart;

// function getPrice($price){
//     $cent = 100;
//     $price = floatval($price) * $cent;
//     // print_r(gettype());
//     // dd(floatval($price));
//     return number_format($price, 2, ',', '') . '€';
// }

function getPriceIntent($price){
    // dd($price);
    $price = floatval(str_replace(",", "", $price));
    return $price;
}