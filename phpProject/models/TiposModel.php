<?php

require_once("./config/DBConnection.php");


class TiposModel extends DBConnection
{
    protected $con;

    public function __construct()
    {
        $this->con = new DBConnection();
    }

    public function getTypes()
    {

    }

    public function save($type)
    {


    }

    public function findType($id)
    {

    }

    public function hasTipo($name)
    {

    }


    public function deleteType($id)
    {
  
    }
}