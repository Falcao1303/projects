<?php

require_once("./config/DBConnection.php");

class ProdutosModel extends DBConnection
{
    protected $con;

    public function __construct()
    {
        $this->con = new DBConnection();
    }

    public function getProducts($hasStock = false)
    {

    }

    public function save($product)
    {
  
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