<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function addToCart($id, $name, $price, $quantity) {
    $_SESSION['cart'][$id] = [
        "name" => $name,
        "price" => $price,
        "quantity" => $quantity
    ];
}

function displayCart() {
    if (empty($_SESSION['cart'])) {
        echo "Your cart is empty.<br>";
        return;
    }

    foreach ($_SESSION['cart'] as $id => $item) {
        echo "Product: " . $item['name'] . " - $" . $item['price'] . " (Qty: " . $item['quantity'] . ")<br>";
    }
}

function removeFromCart($id) {
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
}

//add to the cart
addToCart(101, "Laptop", 1200, 1);
addToCart(102,"Mouse", 20, 1);
addToCart(103, "Screen", 100,2);

//display the cart
displayCart();

//remove from the cart
removeFromCart(101);

echo "<br>";

//display the cart
displayCart();

?>