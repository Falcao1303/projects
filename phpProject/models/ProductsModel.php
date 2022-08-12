<?php

require_once("./config/DBConnection.php");

class ProductsModel extends DBConnection
{
    protected $con;

    public function __construct()
    {
        $this->con = new DBConnection();
    }

    public function getProducts($hasStock = false)
    {

    }

    public function save($product_cod, $description, $price, $amount, $type, $taxes)
    {
        $result = pg_query("INSERT INTO products (cod, description, price, amount, taxes,type_product)
         VALUES ($product_cod, $description, $price, $amount, $type, $taxes)");

         return $result;
    }

    public function findProduct($id)
    {

    }

    public function findProductJson($id)
    {
     
    }

    public function hasProduct($nome)
    {

    }

    public function deleteProduct($id)
    {
      
    }

    public function updateStock($id_product, $quantity)
    {

    }

    public function devolution($id, $qttyReturned)
    {
           
    }
}