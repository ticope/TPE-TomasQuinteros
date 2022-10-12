<?php

require_once './Controller/shopController.php';
require_once './Controller/categoryController.php';
require_once './Controller/LoginController.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'index';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
else{
    $action = 'index';
}


$params = explode('/', $action);

$shopController = new shopController();
$categoryController = new categoryController();
$loginController = new LoginController();



switch ($params[0]) {
    case 'index':
        $shopController->showIndex();
        break;
    case 'showProducts':
        $shopController->showProducts();
        break;
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        $loginController->logout();
        break;    
    case 'verify':
        $loginController->verifyLogin();
        break;
    case 'updateProduct':
        $shopController->updateProduct();
        break;
    case 'product':
        $shopController->showProduct($params[1]);
        break;
    case 'createProduct':
        $shopController->createProduct();
        break;
    case 'deleteProduct':
        $shopController->deleteProduct($params[1]);
        break;
    case 'uploadImage':
        $shopController->uploadImage($params[1]);
        break;
    case 'showCategory':
        $categoryController->showCategorys();
        break;
    case 'showProductsbyCategory':
        $categoryController->showProductsByCategory($params[1]);
        break;
    case 'createCategory':
        $categoryController->createCategory();
        break;
    case 'deleteCategory':
        $categoryController->deleteCategory($params[1]);
        break;
    case 'updateCategory':
        $categoryController->updateCategory($params[1]);
        break;
}