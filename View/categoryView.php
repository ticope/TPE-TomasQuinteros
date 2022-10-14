<?php

require_once 'libs/smarty-3.1.39/smarty-3.1.39/libs/Smarty.class.php';

class categoryView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function renderProductsByCategory($products, $category, $logged)
    {
        var_dump("llego");
        $this->smarty->assign('titulo', "Lista de productos: ");
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('categoria', $category);
        $this->smarty->assign('productos', $products);
        $this->smarty->display('templates/productByCat.tpl');
    }

    function renderCategorys($categorys,$logged)
    {
        $this->smarty->assign('titulo', "Lista de productos");
        $this->smarty->assign('logged', $logged);
        $this->smarty->assign('categorias', $categorys);
        $this->smarty->display('templates/categorylist.tpl');
    }

    function showError($logged)
    { 
        $this->smarty->assign('logged', $logged);
        $this->smarty->display('templates/error.tpl');
    }

    function redirectList()
    {
        header("Location: " . BASE_URL . "showCategory");
    }
}
