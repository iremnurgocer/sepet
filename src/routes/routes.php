<?php
require_once  __DIR__ .'/../Controllers/CartController.php';
require_once  __DIR__ .'/../Controllers/ProductController.php';
require_once  __DIR__ .'/../Controllers/ProductDetailController.php';
require_once __DIR__ . '/../helpers/EncodingHelper.php';
class Route {

    public static function run($path) {

        switch ($path) {
            case '/':
                $controller = new ProductController();
                $controller->listProducts();
                break;
            case '/card':
                $controller = new CartController();
                $controller->viewCart();
                break;
            case '/product_detail':
                // URL'den id parametresini al
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                // E�er id parametresi bo� de�ilse, BlogController'� �a��r ve id parametresiyle birlikte blog metodu �al��t�r
                if ($id !== null) {
                    $controller = new ProductDetailController($id);
                    $controller->detail();
                } else {
                    http_response_code(404);
                    echo "404 Sayfa Bulunamad�";
                }
                break;
            case '/addToCart':
                $productId = isset($_GET['productId']) ? $_GET['productId'] : null;
                // �r�n eklemeye y�nelik i�lemleri ger�ekle�tirmek �zere CartController'� �a��r
                if ($productId !== null) {
                    $controller = new CartController();
                    $controller->addToCart($productId);
                } else {
                    http_response_code(400);
                    echo "Bad Request";
                }
                break;
            case '/removeFromCart':
                $productId = isset($_POST['productId']) ? $_POST['productId'] : null;
                if ($productId !== null) {
                    $controller = new CartController();
                    $controller->removeFromCart($productId);
                } else {
                    http_response_code(400);
                    echo "Bad Request";
                }
                break;
            case '/clearCart':
                $controller = new CartController();
                $controller->clearCart();
                break;
            default:
                http_response_code(404);
                echo "404 Sayfa Bulunamad�";
                break;
        }
    }
}

?>