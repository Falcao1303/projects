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
        echo json_encode(array('SUCCESS'=> TRUE,'PRODUCTS' => $result));
    }

    public function getProduct()
    {
        $id = $_GET['cod'];
        $result = $this->products->getProductId($id);
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

    public function find($id)
    {
        return $this->products->findProduct($id);
    } 

    public function findJson($id)
    {
        die(json_encode($this->products->findProduct($id)));
    } 

    public function delete()
    {
        $id = $_GET['cod'];
        $this->products->deleteProduct($id);
        echo json_encode(array('SUCCESS'=> TRUE,'MESSAGE' => 'PRODUCT EXCLUDED!'));
    }
}

