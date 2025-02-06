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
    case 'add_pro':
        $proController = new ProductController();
        $proController->add();
        break;

    // cart
    default:
        $home = new HomeController();
        $home->home();
        break;

}
?>