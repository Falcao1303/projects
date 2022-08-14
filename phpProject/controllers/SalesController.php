<?php

session_start();
require_once("config/Helper.php");

require_once("./models/SalesModel.php");

class SalesController
{
    public $sell;
    public $products;

    
    public function __construct()
    {
        $this->sell = new SalesModel();
        $this->products = new ProductsModel();
        
    }

    public function show()
    {
        include('./view/sales.php');
    }

    public function save()
    {

    }

    public function getVendas($codigo_venda)
    {

    }

    public function delete($id, $cod = null)
    {

    }

    public function cancel()
    {

    }

    public function finishSell()
    {
        session_destroy();
        header('location: /vendas');
    }
}
