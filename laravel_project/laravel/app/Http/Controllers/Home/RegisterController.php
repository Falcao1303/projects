<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    $name = $request->query('name');
    $email = $request->query('email');
    $password = $request->query('password');
    $terms = $request->query('terms');

    return $this->_modelUsers->saveRegisters();
}

    
}

