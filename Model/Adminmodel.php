<?php

class adminModel
{

    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_shop;charset=utf8', 'root', '');
    }
    function getAdmin($admin)
    {
        $query = $this->db->prepare('SELECT * FROM admins WHERE name = ?');
        $query->execute([$admin]);
        return $query->fetch(PDO::FETCH_OBJ);
        
    }
}
