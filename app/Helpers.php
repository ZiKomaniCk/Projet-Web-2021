<?php

function getPriceIntent($price){
    $price = floatval(str_replace(",", "", $price));
    return $price;
}

function getPriceSolde($price){
    $price = intval(str_replace(",", "", $price));
    return ($price * 10);
}