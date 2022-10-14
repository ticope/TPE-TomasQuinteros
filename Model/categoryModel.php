<?php

class categoryModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_shop;charset=utf8', 'root', '');
    }

    function getCategorysFromDB()
    {
        $sentencia = $this->db->prepare("SELECT * FROM category");
        $sentencia->execute();
        $category = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $category;
    }

    function getCategoryForProduct($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM category WHERE id = ?");
        $sentencia->execute(array($id));
        $category = $sentencia->fetch(PDO::FETCH_OBJ);
        return $category;
    }

    function insertCategoryOnDB($name)
    {
        $sentencia = $this->db->prepare("INSERT INTO category (name) VALUES (?)");
        $sentencia->execute(array($name));
    }

    function deleteCategoryfromdb($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM category WHERE id=?");
        $sentencia->execute(array($id));
    }

    function updateCategoryfromdb($id, $name)
    {
        $sentencia = $this->db->prepare("UPDATE category SET name=? WHERE id=?");
        $sentencia->execute(array($name, $id));
    }
}