<?php
require_once "config/Request.php";
require_once "controllers/ProductsController.php";
require_once "controllers/TiposController.php";
require_once "controllers/SalesController.php";

route('/', function () {
    include('view/home.php');
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

route('/products/add', function () {
    $produtos = new ProductsController();
    $produtos->save();
});

route('/vendas', function () {
    $vendas = new SalesController();
    $vendas->show();
});


route('/venda/close', function () {
    $vendas = new SalesController();
    $vendas->finishSell();
});


if(isset($_GET['product'])){
    route('/products/add/?product='.$_GET['product'], function () {
        $produtos = new ProductsController();
        $produtos->save();
    });
}


if (isset($_POST['codigo_venda']))
{
    route('/vendas/add', function () {
        $vendas = new SalesController();
        $vendas->save();
    });

}


if (isset($_GET['cod']))
{
    
    route('/venda/?cod='.$_GET['cod'], function () {
        $vendas = new SalesController();
        $vendas->show();
    });
    
    route('/venda/cancel/?cod='.$_GET['cod'], function(){
        $vendas = new SalesController();
        $vendas->cancel();
        
    });
}


if (isset($_GET['id']))
{

    route('tipos/find/?id='.$_GET['id'], function () {
        $tipos = new TiposController();
        $tipos->find($_GET['id']);
    });

    route('/tipos/delete/?id='.$_GET['id'] , function () {
        $tipos = new TiposController();
        $tipos->delete($_GET['id']);
    });

    route('produtos/find/?id='.$_GET['id'], function () {
        $produtos = new ProductsController();
        $produtos->find($_GET['id']);
    });

    route('produtos/findjson/?id='.$_GET['id'], function () {
        $produtos = new ProductsController();
        $produtos->findJson($_GET['id']);
    });

    route('/produtos/delete/?id='.$_GET['id'] , function () {
        $produtos = new ProductsController();
        $produtos->delete($_GET['id']);
    });

    if (isset($_GET['cod_venda']))
    {
        route('/vendas/delete/?id='.$_GET['id'].'&cod_venda='.$_GET['cod_venda'] , function () {
            $vendas = new SalesController();
            $vendas->delete($_GET['id'], $_GET['cod_venda']);
        });
    }
}


$action = $_SERVER['REQUEST_URI'];
dispatch($action, function(){
    "erro";
});