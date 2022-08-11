<?php

require_once "./models/TiposModel.php";

class TiposController
{
    public $tipos;

    public function __construct() 
    {
        $this->tipos = new TiposModel();
    }

    public function show()
    {
        include('./view/tipos.php');
    }

    public function getTypes()
    {
        $result = $this->tipos->getTypes();
        return $result;
    }

    public function save()
    {
        $novoTipo['id']        = $_POST['id'];
        $novoTipo['nome']      = $_POST['nome'];
        $novoTipo['aliquota']  = formatCurrency($_POST['aliquota']);
        $novoTipo['descricao'] = $_POST['descricao'];

        $msg = '';
        if ( $this->tipos->save($novoTipo) )
        {
            $msg = 1;
        }
        else
        {
            $msg = 2;
        }
        
        header('location: /tipos');
        exit();
    }

    public function find($id)
    {
        return $this->tipos->findType($id);
    }   

    public function delete($id)
    {
        $this->tipos->deleteType($id);

        header('location: /tipos');
        exit();
    }
}

