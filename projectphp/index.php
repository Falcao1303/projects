<?php


require_once "config/Request.php";
require_once "controllers/ProductsController.php";
require_once "controllers/SalesController.php";



//views routes
route('/', function () {
    $vendas = new SalesController();
    $vendas->show();
});

route('/sales', function () {
    $vendas = new SalesController();
    $vendas->show();
});

route('/products', function () {
    $produtos = new ProductsController();
    $produtos->show();
});

route('/products/getSales', function () {
    $sales = new SalesController();
    $sales->getSales();
});

//back-end routes

//crud products
if(isset($_GET['product'])){
    
    $product_cod = $_GET['cod'];
    $description = $_GET['product'];
    $price = $_GET['price'];
    $amount = $_GET['amount'];
    $type = $_GET['type_product'];
    $taxes = $_GET['taxes'];


    if($_GET['update'] == 'true'){
        route('/products/update?amount='.$amount.'&cod='.$product_cod.'&id='.$_GET['id'].'&price='.$price.'&product='.$description.'&save=false'.'&taxes='.$taxes.'&type_product='.$type.'&update=true', function () {
            $produtos = new ProductsController();
            $produtos->updateProduct();
        });
    }else{
        route('/products/add?amount='.$amount.'&cod='.$product_cod.'&price='.$price.'&product='.$description.'&save=true'.'&taxes='.$taxes.'&type_product='.$type.'&update=false', function () {
        
            $produtos = new ProductsController();
            $produtos->save();
        });
    }
   
}

if(isset($_GET['edit'])){
    
        route('/products/getProduct?cod='.$_GET['cod'].'&edit='.$_GET['edit'], function () {
            $products = new ProductsController();
            $products->getProduct();
        });
}



if(!isset($_GET['edit']) && isset($_GET['cod'])){
    route('/products/delete?cod='.$_GET['cod'] , function () {
        $products = new ProductsController();
        $products->delete();
    });
}


if(isset($_GET['cod']) && isset($_GET['save']) && !isset($_GET['edit'])){

    if($_GET['save'] == false){
        route('/products/getProduct?cod='.$_GET['cod'].'&edit='.$_GET['edit'], function () {
            $products = new ProductsController();
            $products->getProduct();
        });
    }

}



route('/products/getProducts', function () {
    $produtos = new ProductsController();
    $produtos->getProducts();
});


//crud sales
if(isset($_GET['id_sale'])){
    $amount = !isset($_GET['amount']) ? 0 : $_GET['amount'];
    $product_cart = !isset($_GET['product_cart']) ? 0 : $_GET['product_cart'];
    $id = !isset($_GET['id_sale']) ? 0 : $_GET['id_sale'];
    route('sales/addToCart?amount='.$amount.'&id_sale='.$id.'&product_cart='.$product_cart, function () {
        $sales = new SalesController();
        $sales->saveToTheCart();
    });

    route('/products/getProductsCart?id_sale='.$id, function () {
        $sales = new SalesController();
        $sales->getProductsCart();
    });

    route('/products/saveSale?id_sale='.$id, function () {
        $sales = new SalesController();
        $sales->saveSale();
    });
    

}


$action = $_SERVER['REQUEST_URI'];
dispatch($action, function(){
   echo "erro";
});