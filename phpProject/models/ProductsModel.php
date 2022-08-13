<?php

require_once("./config/DBConnection.php");

class ProductsModel extends DBConnection
{
    protected $con;

    public function __construct()
    {
        $this->con = new DBConnection();
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $result = pg_query($sql);
        $products = pg_fetch_all($result);
        return $products;
    }

    public function save($product_cod, $description, $price, $amount, $type, $taxes)
    {
        $sql = "INSERT INTO products (cod,product, price, amount, taxes,type_product)
         VALUES ($product_cod, '$description', $price::money, $amount, $taxes::money,'$type')";
        $result = pg_query($sql);
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
        $sql = "DELETE FROM products WHERE cod = $id";
        $result = pg_query($sql);
        return $result;
    }

    public function updateStock($id_product, $quantity)
    {

    }

    public function devolution($id, $qttyReturned)
    {
           
    }
}