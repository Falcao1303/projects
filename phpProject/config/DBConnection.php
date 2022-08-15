<?php
ini_set('display_errors', 1);

class DBConnection
{
    protected $con;
    
    public function __construct()
    {
        $dbuser = "postgres";
        $dbpass = "131303";
        $dbname = "postgres";
        
        try 
        {
            $connect = pg_connect("host=localhost port=5432 dbname=".$dbname." user=".$dbuser." password=".$dbpass) or die("Falha ao tentar conectar com o postgres");
        } 
        catch (Exception $e) 
        {
            echo "Falha ao conectar: " . $e->getMessage();
        }
    }
}
