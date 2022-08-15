<?php

require_once "./models/ProductsModel.php";

class ProductsController
{
    public $products;

    public function __construct() 
    {
        $this->products = new ProductsModel();
        
    }

    public function show()
    {
        include('./view/products.php');
    }

    public function getProducts()
    {
        try{
            $result = $this->products->getProducts();
            foreach ($result as $key => $value) {
                $total_price = ['total_price' => floatval(str_replace('R$','',$value['price'])) * (int)$value['amount']];
                $total_taxes = ['total_taxes' => floatval(str_replace('R$','',$value['taxes'])) * (int)$value['amount']];
                $total_price['total_price'] =  'R$ '.number_format($total_price['total_price'], 2, ',', '.');
                $total_taxes['total_taxes'] =  'R$ '.number_format($total_taxes['total_taxes'], 2, ',', '.');
                $result[$key] = array_merge($value, $total_price,$total_taxes);
            }
            echo json_encode(array('SUCCESS'=> TRUE,'PRODUCTS' => $result));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage()));
        }
    }

    public function getProduct()
    {
        try{
            $id = $_GET['cod'];
            $result = $this->products->getProductId($id);
            if($_GET['edit'] == 'true'){
                $result[0]['price'] = trim(str_replace(',','.',str_replace('R$','',$result[0]['price']))); 
                $result[0]['taxes'] = trim(str_replace(',','.',str_replace('R$','',$result[0]['taxes'])));
            }
            echo json_encode(array('SUCCESS'=> TRUE,'PRODUCT' => $result));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage()));
        }

    }

    public function updateProduct(){
        try{
            $id = $_GET['id'];
            $product_cod = $_GET['cod'];
            $description = (string)$_GET['product'];
            $price = $_GET['price'];
            $amount = $_GET['amount'];
            $type = (string)$_GET['type_product'];
            $taxes = $_GET['taxes'];
            $this->products->update($id,$product_cod, $description, $price, $amount, $type, $taxes);
            echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'Product updated successfully'));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage()));
        }

    }

    public function save()
    {
        try{
            $product_cod = $_GET['cod'];
            $description = (string)$_GET['product'];
            $price = $_GET['price'];
            $amount = $_GET['amount'];
            $type = (string)$_GET['type_product'];
            $taxes = $_GET['taxes'];
            $products = $this->products->save($product_cod, $description, $price, $amount, $type, $taxes);
            return $products;
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage()));
        }

    }


    public function delete()
    {
        try{
            $id = $_GET['cod'];
            $this->products->deleteProduct($id);
            echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'PRODUCT EXCLUDED!'));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage()));
        }

    }
}

