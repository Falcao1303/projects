<?php

session_start();
require_once("config/Helper.php");
require_once "./models/ProductsModel.php";
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


    public function saveToTheCart()
    {
        try{
            $amount = $_GET['amount'];
            $product_cart = $_GET['product_cart'];
            $id = $_GET['id_sale'];
            $getDetailProduct = $this->products->getProductId($product_cart);
            $price = str_replace('R$ ','',$getDetailProduct[0]['price']);
            $subtotal = $amount * floatval($price);
            $this->sell->saveToTheCart($amount, $product_cart, $id,$subtotal);
            echo json_encode(array('success' => true));
        }catch(Exception $e){
            echo json_encode(array('success' => false, 'message' => $e->getMessage()));
        }

    }

    public function getProductsCart(){
        try{
            $id = $_GET['id_sale'];
            $products = $this->sell->getProductsCart($id);
            echo json_encode(array('success'=> true,'products'=>$products));
        }catch(Exception $e){
            echo json_encode(array('success'=> false,'message'=> $e->getMessage()));
        }

    }

    public function saveSale(){
        try{
            $id = $_GET['id_sale'];
            $getSale = $this->sell->getSale($id);
            $amount = $getSale[0]['amount'];
            $total = $getSale[0]['sub_total'];
            $saveSale = $this->sell->saveSale($id,$amount,$total);
         echo json_encode(array('success'=> true,'sales'=>$saveSale,'message'=>'Sale id '.$id. ' Closed!'));
        }catch(Exception $e){
            echo json_encode(array('success'=> false,'message'=> $e->getMessage()));
        }

    }
    

    public function getSales(){
        try{
            $sales = $this->sell->getSales();
            echo json_encode(array('success'=> true,'sales'=>$sales));
        }catch(Exception $e){
            echo json_encode(array('success'=> false,'message'=> $e->getMessage()));
        }

    }


}
