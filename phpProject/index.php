<?php
require_once "config/Request.php";
require_once "controllers/ProductsController.php";
require_once "controllers/TiposController.php";
require_once "controllers/SalesController.php";



//views routes
route('/', function () {
    include('view/home.php');
});

route('/sales', function () {
    $vendas = new SalesController();
    $vendas->show();
});

route('/tipos', function () {
    $tipos = new TiposController();
    $tipos->show();
});

route('/tipos/add', function () {
    $tipos = new TiposController();
    $tipos->save();
});

route('/products', function () {
    $produtos = new ProductsController();
    $produtos->show();
});

//back-end routes

if(isset($_GET['product'])){
    $product_cod = $_GET['cod'];
    $description = $_GET['product'];
    $price = $_GET['price'];
    $amount = $_GET['amount'];
    $type = $_GET['type_product'];
    $taxes = $_GET['taxes'];
    route('/products/add?amount='.$amount.'&cod='.$product_cod.'&price='.$price.'&product='.$description.'&taxes='.$taxes.'&type_product='.$type, function () {
        $produtos = new ProductsController();
        $produtos->save();
    });

    route('/products/update?amount='.$amount.'&cod='.$product_cod.'&id='.$_GET['id'].'&price='.$price.'&product='.$description.'&taxes='.$taxes.'&type_product='.$type, function () {
        $produtos = new ProductsController();
        $produtos->updateProduct();
    });
}

if(isset($_GET['cod'])){
    route('/products/delete?cod='.$_GET['cod'] , function () {
        $products = new ProductsController();
        $products->delete();
    });

    route('/products/getProduct?cod='.$_GET['cod'].'&edit='.$_GET['edit'], function () {
        $products = new ProductsController();
        $products->getProduct();
    } );
}



route('/products/getProducts', function () {
    $produtos = new ProductsController();
    $produtos->getProducts();
});




if (isset($_POST['codigo_venda']))
{
    route('/vendas/add', function () {
        $vendas = new SalesController();
        $vendas->save();
    });

}


if (isset($_GET['id']))
{

    route('tipos/find/?id='.$_GET['id'], function () {
        $tipos = new TiposController();
        $tipos->find($_GET['id']);
    });


}


$action = $_SERVER['REQUEST_URI'];
dispatch($action, function(){
    "erro";
});