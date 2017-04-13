<?php

function addToCart($songName) { // havent tested, check it out - to add other params just concatinate to the string $songName when storing into $cart
    global $cart;
    if (isset($_SESSION["shoppingCart"]) && !empty($_SESSION["shoppingCart"])) {
        $cart = $_SESSION["shoppingCart"];
    } else {
        $cart = array();
    }
    $cart[count($cart)] = $songName;
    $_SESSION["shoppingCart"] = $cart; // if this function was called in the first place, should store to session shoppingCart
}

?>