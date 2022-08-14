<?php

session_start();
require_once("config/Helper.php");

// require_once("./models/SalesModel.php");

class SalesController
{
    public $sell;
    public $products;

    
    public function __construct()
    {
        // $this->sell = new SalesModel();
        // $this->products = new ProductsModel();
        
    }

    public function show()
    {
        include('./view/sales.php');
    }


    public function saveToTheCart()
    {
        $amount = $_GET['amount'];
        $product_cart = $_GET['product_cart'];
        $id = $_GET['id_sale'];
        // $getDetailProduct = $this->products->getProductId($product_cart);
        // pega o valor do produto para adicionar no carrinho
        // $this->sell->saveToTheCart($amount, $product_cart, $id);
        echo json_encode(array('success' => true));
    }

    public function getProductsCart(){
        $id = $_GET['id_sale'];
        // $products = $this->sell->getProductsCart($id);
        // echo json_encode(array('success'=> true,'products'=>$products));
    }

    public function saveSale(){
        $id = $_GET['id_sale'];
        // fazer query para pegar venda e total lá do carrinho
       // $this->sell->getSale($id);
    //query para pegar o resultado e salvar em uma tabela só com venda e totais
    echo json_encode(array('success'=> true,'sales'=>'sales'));
    }
    

    public function getSales(){
        //$sales = $this->sell->getSales();
        echo json_encode(array('success'=> true,'sales'=>'sales'));
    }

    public function cancel()
    {

    }

}
