<?php

require_once("./config/DBConnection.php");

class SalesModel extends DBConnection
{
    protected $con;

    public function __construct()
    {
        $this->con = new DBConnection();
    }

    public function saveSale($id,$amount,$total)
    {
        $sql = "INSERT INTO sales (id,amount,sale_total)
         VALUES ($id,$amount,'$total'::money) RETURNING id";
        $result = pg_query($sql);
         return $result;
    }

    public function getSales()
    {
        $sql = "SELECT * FROM sales";
        $result = pg_query($sql);
        $sales =  pg_fetch_all($result);
        return $sales;
    }

    public function getSale($code)
    {
        $sql = "SELECT sale_id,sum(sub_total) as sub_total,sum(amount) as amount FROM shop_cart where sale_id = $code group by sale_id";
        $result = pg_query($sql);
        $sale = pg_fetch_all($result);
        return $sale;
    }

    public function saveToTheCart($amount, $product_cart, $id,$subtotal)
    {
        $sql = "INSERT INTO shop_cart (amount, product, sale_id,sub_total) VALUES ('$amount', '$product_cart', '$id',$subtotal::money)";
        $add = pg_query($sql);
        return $add ;
    }


    public function deleteSelling($id)
    {

    }

    public function getProductsCart($id){
        $sql = "SELECT  sp.sale_id,sp.amount,sp.product,sp.sub_total,p.product
                FROM shop_cart sp 
                left join products p 
                on p.cod::varchar = sp.product where sale_id = $id";
        $result = pg_query($sql);
        $products = pg_fetch_all($result);
        return $products;
    }
}