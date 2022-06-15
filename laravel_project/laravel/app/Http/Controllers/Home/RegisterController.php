<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Js;
use App\Models\Users\UsersModel;

class RegisterController extends Controller{


private $_modelUsers;

public function __construct(){
    $this->_modelUsers = new UsersModel();
}

public function index(){
    return view('register');
}


public function getRegisters(){
    return $this->_modelUsers->getRegisters();
}

public function saveRegister(Request $request){
    echo'<pre>';
    dd($request->post());
    exit;
    return $this->_modelUsers->saveRegisters();
}

    
}

