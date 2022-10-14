<?php

class shopModel
{

    private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_shop;charset=utf8', 'root', '');
        }

        function getProductsFromDB()
        {
            $sentencia = $this->db->prepare("SELECT * FROM products");
            $sentencia->execute();
            $products = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $products;
        }
       function getProduct($id)
        {
            $sentencia = $this->db->prepare("SELECT * FROM products WHERE id = ?");
            $sentencia->execute(array($id));
            $product = $sentencia->fetch(PDO::FETCH_OBJ);
            return $product;
        }
    
        function getProductsByCategory($id)
        {
            $sentencia = $this->db->prepare("SELECT * FROM products WHERE id_category = ?");
            $sentencia->execute(array($id));
            $products = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $products;
        }
    
        function insertProductOnDB($name, $price, $category)
        {
            $sentencia = $this->db->prepare("INSERT INTO products (name,price,id_category) VALUES (?, ?, ?)");
            $sentencia->execute(array($name, $price, $category));
        }
    
        function deleteProductFromdb($id)
        {
            $sentencia = $this->db->prepare("DELETE FROM products WHERE id = ?");
            $sentencia->execute(array($id));
        }
    
    
        function updateProductFromDB($name, $price, $category,$id)
        {
            $sentencia = $this->db->prepare("UPDATE products SET name=?,price=?,id_category=? WHERE id=?");
            $sentencia->execute(array($name, $price, $category,$id));
        }
        function uploadImage($id, $image)
        {
            if ($image) {
                $pathImg = $this->moveImage($image);
                $query = $this->db->prepare("UPDATE products SET img=? WHERE id=?");
                $query->execute(array($pathImg, $id));
            }
        }
    
        private function moveImage($image){
            $target = "img/products/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
            move_uploaded_file($image['tmp_name'], $target);
            return $target;
        }
}
