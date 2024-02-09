<?php
// src/Controllers/CartController.php

require_once __DIR__ . '/../Models/Cart.php';

session_start();

class CartController {
    private $CardModel;

    public function __construct() {
        $this->CardModel = new Cart();
    }

    public function addToCart($productId, $quantity = 1) {
        $this->cart->addProduct($productId, $quantity);
        $_SESSION['cart'] = $this->cart;
        // Ekleme i�leminden sonra ana �r�n listesine y�nlendir
        header('Location: /?page=products');
        exit();
    }

    public function removeFromCart($productId) {
        $this->cart->removeProduct($productId);
        $_SESSION['cart'] = $this->cart;
        // ��karma i�leminden sonra sepet sayfas�na y�nlendir
        header('Location: /?page=cart');
        exit();
    }

    public function viewCart() {
        $items = $this->cart->getItems();
        require_once __DIR__ . '/../Views/cart.php';
    }

    // ... Di�er sepet i�lemleri
}
?>
