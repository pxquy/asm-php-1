<?php
session_start();

$router = $_GET['router'] ?? '';
include_once('controller/login-controller.php');
include_once('controller/home-controller.php');
include_once('controller/product-controller.php');

switch ($router) {
    // auth
    case 'login':
        $login = new LoginController();
        $login->login();
        break;

    // product
    case 'product':
        $productController = new ProductController();
        $productController->list();
        break;
    case 'add-product':
        $productController = new ProductController();
        $productController->add();
        break;

    // cart
    default:
        $home = new HomeController();
        $home->home();
        break;

}
?>