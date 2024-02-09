<?php
require_once  __DIR__ .'/../Controllers/CartController.php';
require_once  __DIR__ .'/../Controllers/ProductController.php';
require_once  __DIR__ .'/../Controllers/ProductDetailController.php';
class Route {

    public static function run($path) {

        switch ($path) {
            case '/':
                $controller = new ProductController();
                $controller->listProducts();
                break;
            case '/cart':
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
            default:
                http_response_code(404);
                echo "404 Sayfa Bulunamad�";
                break;
        }
    }
}

?>