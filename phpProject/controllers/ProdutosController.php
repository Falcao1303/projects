<?php

require_once "./models/ProdutosModel.php";

class ProdutosController
{
    public $products;

    public function __construct() 
    {
        $this->products = new ProdutosModel();
        
    }

    public function show()
    {
        include('./view/produtos.php');
    }

    public function getProducts()
    {
        $result = $this->products->getProducts();
        return $result;
    }

    public function getProdutosDisponiveis()
    {
        $result = $this->products->getProducts(true);
        return $result;
    }

    public function save()
    {

    }

    public function find($id)
    {
        return $this->products->findProduct($id);
    } 

    public function findJson($id)
    {
        die(json_encode($this->products->findProduct($id)));
    } 

    public function delete($id)
    {
        $this->products->deleteProduct($id);

        header('location: /produtos');
        exit();
    }
}

