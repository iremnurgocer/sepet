<?php
// src/Controllers/CartController.php

require_once __DIR__ . '/../Models/Cart.php';

session_start();

class CartController {
    private $CartModel;

    public function __construct() {
        $this->CartModel = new Cart();
        if(empty($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }
    }

    public function addToCart($productId) {

        $this->CartModel->addProduct($productId);
        $_SESSION['cart'][] += $productId;
        header('Location: /');
        exit();
    }

    public function removeFromCart($productId) {
        $indeks = array_search($productId, $_SESSION['cart']);
        if ($indeks !== false) {
            unset($_SESSION['cart'][$indeks]);
        }

        header('Location: /cart');
        exit();
    }

    public function viewCart() {
        $Products = $this->CartModel->getCartProducts($_SESSION['cart']);
        require_once __DIR__ . '/../Views/cart.php';
    }
    public function clearCart() {
        unset($_SESSION['cart']);
        header('Location: /cart');
        exit();
    }

}
