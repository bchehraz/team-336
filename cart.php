<?php

//Load the cart; otherwise create empty cart and store into session.
if (isset($_SESSION["shoppingCart"]) && !empty($_SESSION["shoppingCart"])) {
    global $cart;
    $cart = $_SESSION["shoppingCart"];
} else {
    $cart = array();
    $_SESSION["shoppingCart"] = $cart;
}

function addToCart($songName, $artistName) {
    //not sure if another global $cart is necessary
    global $cart;
    $cart[count($cart)] = $songName;
}
?>