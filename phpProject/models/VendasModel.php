<?php

require_once("./config/DBConnection.php");

class VendasModel extends DBConnection
{
    protected $con;

    public function __construct()
    {
        $this->con = new DBConnection();
    }

    public function save($produto)
    {

    }

    public function getVendas($codigo_venda)
    {

    }


    public function deleteSelling($id)
    {

    }

    public function deleteSellingByIDProduto($id, $codigo_venda)
    {
        
    }
}