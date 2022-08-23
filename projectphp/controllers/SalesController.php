<?php

session_start();
require_once "./models/ProductsModel.php";
require_once("./models/SalesModel.php");
require_once("./Lib/operacoes.php");

class SalesController
{
    public $sell;
    public $products;
    public $operacoes;
    
    public function __construct()
    {
        $this->sell = new SalesModel();
        $this->products = new ProductsModel();
        $this->operacoes = new Lib_Operacoes();
        
    }

    public function show()
    {
        include('./view/sales.php');
    }


    public function saveToTheCart()
    {
        try{
            $amount = $_GET['amount'];
            $product_cart = $_GET['product_cart'];
            $id = $_GET['id_sale'];
            $getDetailProduct = $this->products->getProductId($product_cart);
            $subtotal = $amount * $this->operacoes->convertToFloat($getDetailProduct[0]['price']);//floatval($price);
            $this->sell->saveToTheCart($amount, $product_cart, $id,$subtotal);
            echo json_encode(array('success' => true,'STATUS' => http_response_code(201)));
        }catch(Exception $e){
            echo json_encode(array('success' => false, 'message' => $e->getMessage(),'STATUS' => http_response_code(400)));
        }

    }

    public function getProductsCart(){
        try{
            $id = $_GET['id_sale'];
            $products = $this->sell->getProductsCart($id);
            echo json_encode(array('success'=> true,'products'=>$products,'STATUS' => http_response_code(200)));
        }catch(Exception $e){
            echo json_encode(array('success'=> false,'message'=> $e->getMessage(),'STATUS' => http_response_code(404)));
        }

    }

    public function saveSale(){
        try{
            $id = $_GET['id_sale'];
            $getSale = $this->sell->getSale($id);
            $amount = $getSale[0]['amount'];
            $total = $getSale[0]['sub_total'];
            $saveSale = $this->sell->saveSale($id,$amount,$total);
         echo json_encode(array('success'=> true,'sales'=>$saveSale,'message'=>'Venda nº '.$id. ' fechada!','STATUS' => http_response_code(201)));
        }catch(Exception $e){
            echo json_encode(array('success'=> false,'message'=> $e->getMessage(),'STATUS' => http_response_code(400)));
        }

    }
    

    public function getSales(){
        try{
            $sales = $this->sell->getSales();
            echo json_encode(array('success'=> true,'sales'=>$sales,'STATUS' => http_response_code(200)));
        }catch(Exception $e){
            echo json_encode(array('success'=> false,'message'=> $e->getMessage(),'STATUS' => http_response_code(404)));
        }

    }


}
