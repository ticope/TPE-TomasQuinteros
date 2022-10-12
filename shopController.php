<?php
require_once './Model/shopModel.php';
require_once './Model/categoryModel.php';
require_once './View/shopView.php';
require_once "./Helpers/AuthHelper.php";

class shopController {
    private $model;
    private $category;
    private $view;
    private $AuthHelper;
    public function __construct(){
        $this->model = new shopModel();
        $this->category = new categoryModel();
        $this->view = new shopView();
        $this->AuthHelper= new AuthHelper();
    }

    function showIndex(){
        $logged  = $this->AuthHelper->checkLoggedIn();
        $this->view->renderIndex($logged);
    }
    function showProducts(){
        $logged = $this->AuthHelper->checkLoggedIn();
        $product = $this->model->getProductsFromDB();
        $category = $this->category->getCategorysFromDB();
        $this->view->renderProductList($product, $category,$logged);
    }
    function showProduct($id)
    {
        $logged = $this->AuthHelper->checkLoggedIn();
        $product = $this->model->getProduct($id);
        $this->view->renderProduct($product,$logged);
    }
    function uploadImage($id)
    {
        
        $logged = $this->AuthHelper->checkLoggedIn();
        if($logged){
            if ($_FILES['images']['type'] == "image/jpg" || $_FILES['images']['type'] == "image/jpeg" || $_FILES['images']['type'] == "image/png") {
            
            $this->model->uploadImage($id, $_FILES['images']);
            var_dump("llego");
            $this->showProduct($id);
        } else {
            $this->view->showError($logged);
        }
        }
    }
    function deleteProduct($id)
    {
        $logged = $this->AuthHelper->checkLoggedIn();
        if($logged){
        $this->model->deleteProductFromdb($id);
        $this->view->redirectList();
        }
    }   
    function createProduct()
    {
        $logged = $this->AuthHelper->checkLoggedIn();
        if($logged){
            if (!empty($_POST['name']) && !empty($_POST['price'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $category = $_POST['id_category'];
                $this->model->insertProductOnDB($name, $price,$category);
                $this->view->redirectList();
            } else {
                $this->view->showError($logged);
            }
        }
    }
    function updateProduct()
    {
        $logged = $this->AuthHelper->checkLoggedIn();
        if($logged){
            if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['id_category'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $category = $_POST['id_category'];
                $id = $_POST['id'];
                $this->model->updateProductFromDB($name, $price, $category, $id);
                $this->view->redirectList();
            } else {
                $this->view->showError($logged);
            }
        }    
    }

}