<?php

session_start();

//Load the cart; otherwise create empty cart and store into session.
if (isset($_SESSION["shoppingCart"]) && !empty($_SESSION["shoppingCart"])) {
    global $cart;
    $cart = $_SESSION["shoppingCart"];
} else {
    $cart = array();
    $_SESSION["shoppingCart"] = $cart;
}

function addToCart($songName, $artistName) {
    global $cart;
    $cart[count($cart)] = $songName;
}
?>