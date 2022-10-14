<?php

require_once 'libs/smarty-3.1.39/smarty-3.1.39/libs/Smarty.class.php';

class shopView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }
    function renderIndex($logged)
    {
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/index.tpl');
    }
    function renderProductList($product, $categorys,$logged)
    {
        $this->smarty->assign('Nombre', "Lista de Productos");
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('productos', $product);
        $this->smarty->assign('categorys', $categorys);
        $this->smarty->display('templates/productsList.tpl');
    }  
    function renderProduct($product,$logged)
    {
        $this->smarty->assign('product', $product);
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/product.tpl');
    }

    function redirectList()
    {
        header("Location: " . BASE_URL . "showProducts");
    }

    function showError($logged)
    { 
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/error.tpl');
    }
}
