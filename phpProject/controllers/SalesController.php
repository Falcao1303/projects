<?php

session_start();
require_once("config/Helper.php");

require_once("./models/VendasModel.php");

class SalesController
{
    public $sell;
    public $products;

    
    public function __construct()
    {
        $this->sell = new VendasModel();
        $this->products = new ProdutosModel();

        
        if (!isset($_SESSION['codVenda']) || $_SESSION['codVenda'] == null)
        {
            $_SESSION['codVenda'] = str_replace(array("-", " ", ":", "pm", "am"), "", date('YmdHis'));
        }
        
    }

    public function show()
    {
        include('../view/vendas.php');
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
