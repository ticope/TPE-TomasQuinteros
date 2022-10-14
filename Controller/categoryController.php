<?php

require_once './Model/categoryModel.php';
require_once './Model/shopModel.php';
require_once './View/categoryView.php';
require_once './Helpers/AuthHelper.php';

class categoryController
{

    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->model = new categoryModel();
        $this->view = new categoryView();
        $this->shopModel = new shopModel();
        $this->authHelper = new AuthHelper();
    }

    function showCategorys()
    {
        $logged = $this->authHelper->checkLoggedIn();
        $categorys = $this->model->getCategorysFromDB();
        $this->view->renderCategorys($categorys, $logged);
    }

    function showProductsByCategory($id)
    {
        $logged = $this->authHelper->checkLoggedIn();
        $products = $this->shopModel->getProductsByCategory($id);
        $category = $this->model->getCategoryForProduct($id);
        $this->view->renderProductsByCategory($products, $category, $logged);
    }

    function createCategory()
    {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged){
        if(!empty($_POST['category'])){
            $name = $_POST['category'];
            $this->model->insertCategoryOnDB($name);
            $this->view->redirectList();
        }else{
            $this->view->showError($logged);
        }
    }
    }

    function deleteCategory($id)
    {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged){
        $this->model->deleteCategoryfromdb($id);
        $this->view->redirectList();
        }
    }

    function updateCategory()
    {
        $logged = $this->authHelper->checkLoggedIn();
        if($logged){
        if(!empty($_POST['name'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $this->model->updateCategoryfromdb($id, $name);
            $this->view->redirectList();
        }else{
            $this->view->showError($logged);
        }
    }
    }
}