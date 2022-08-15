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
        $result = $this->products->getProducts();
        foreach ($result as $key => $value) {
            $result[$key]['price'] = number_format($value['price'], 2, ',', '.');
        }
        echo json_encode(array('SUCCESS'=> TRUE,'PRODUCTS' => $result));
    }

    public function getProduct()
    {
        $id = $_GET['cod'];
        $result = $this->products->getProductId($id);
        if($_GET['edit'] == 'true'){
            $result[0]['price'] = str_replace(',','.',str_replace('R$','',$result[0]['price'])); 
            $result[0]['taxes'] = str_replace(',','.',str_replace('R$','',$result[0]['taxes']));
        }
        echo json_encode(array('SUCCESS'=> TRUE,'PRODUCT' => $result));
    }

    public function updateProduct(){
        $id = $_GET['id'];
        $product_cod = $_GET['cod'];
        $description = (string)$_GET['product'];
        $price = $_GET['price'];
        $amount = $_GET['amount'];
        $type = (string)$_GET['type_product'];
        $taxes = $_GET['taxes'];
        $this->products->update($id,$product_cod, $description, $price, $amount, $type, $taxes);
        echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'Product updated successfully'));
    }

    public function save()
    {
        $product_cod = $_GET['cod'];
        $description = (string)$_GET['product'];
        $price = $_GET['price'];
        $amount = $_GET['amount'];
        $type = (string)$_GET['type_product'];
        $taxes = $_GET['taxes'];
        $products = $this->products->save($product_cod, $description, $price, $amount, $type, $taxes);
        return $products;
    }


    public function delete()
    {
        $id = $_GET['cod'];
        $this->products->deleteProduct($id);
        echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'PRODUCT EXCLUDED!'));
    }
}

