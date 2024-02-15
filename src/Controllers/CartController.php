<?php
// src/Controllers/CartController.php

require_once __DIR__ . '/../Models/Cart.php';

session_start();

class CartController {
    private $CardModel;

    public function __construct() {
        $this->CardModel = new Cart();
        if(empty($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }
    }

    public function addToCart($productId) {

        $this->CardModel->addProduct($productId);
        $_SESSION['cart'][] += $productId;
        header('Location: /');
        exit();
    }

    public function removeFromCart($productId) {
        $indeks = array_search($productId, $_SESSION['cart']);
        if ($indeks !== false) {
            unset($_SESSION['cart'][$indeks]);
        }

        header('Location: /card');
        exit();
    }

    public function viewCart() {
        $Products = $this->CardModel->getCardProducts($_SESSION['cart']);
        require_once __DIR__ . '/../Views/cart.php';
    }
    public function clearCart() {
        unset($_SESSION['cart']);
        header('Location: /card');
        exit();
    }

}
