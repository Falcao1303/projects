<?php

require_once "./models/ProductsModel.php";
require_once "./Lib/operacoes.php";

class ProductsController
{
    public $products;
    public $operacoes;

    public function __construct() 
    {
        $this->products = new ProductsModel();
        $this->operacoes = new Lib_Operacoes();
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
                $total_price = ['total_price' => $this->operacoes->convertToFloat($value['price']) * (int)$value['amount']];
                $total_taxes = ['total_taxes' => $this->operacoes->convertToFloat($value['taxes']) * (int)$value['amount']];
                $total_price['total_price'] =  $this->operacoes->convertToMoney($total_price['total_price']);
                $total_taxes['total_taxes'] =  $this->operacoes->convertToMoney($total_taxes['total_taxes']);
                $result[$key] = array_merge($value, $total_price,$total_taxes);
            }
            echo json_encode(array('SUCCESS'=> TRUE,'PRODUCTS' => $result,'STATUS' => http_response_code(200)));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage(),'STATUS' => http_response_code(404)));
        }
    }

    public function getProduct()
    {
        try{
            $id = $_GET['cod'];
            $result = $this->products->getProductId($id);
            if($_GET['edit'] == 'true'){
                $result[0]['price'] = trim(str_replace('R$','',$result[0]['price'])); 
                $result[0]['taxes'] = trim(str_replace('R$','',$result[0]['taxes']));
            }
            echo json_encode(array('SUCCESS'=> TRUE,'PRODUCT' => $result));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage(),'STATUS' => http_response_code(404)));
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
            echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'Produto atualizado com sucesso','STATUS' => http_response_code(204)));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage(),'STATUS' => http_response_code(400)));
        }

    }

    public function save()
    {
        try{
            $product_cod = $_GET['cod'];
            $description = (string)$_GET['product'];
            $price = 'R$'.$_GET['price'];
            $amount = $_GET['amount'];
            $type = (string)$_GET['type_product'];
            $taxes = 'R$'.$_GET['taxes'];
            $products = $this->products->save($product_cod, $description, $price, $amount, $type, $taxes);
            echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'Registrado!','STATUS' => http_response_code(201)));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage(),'STATUS' => http_response_code(400)));
        }

    }


    public function delete()
    {
        try{
            $id = $_GET['cod'];
            $this->products->deleteProduct($id);
            echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'Produto Excluído!','STATUS' => http_response_code(204)));
        }catch(Exception $e){
            echo json_encode(array('SUCCESS'=> FALSE,'MESSAGE' => $e->getMessage(),'STATUS' => http_response_code(400)));
        }

    }
}

