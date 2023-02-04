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

    $savedb = $this->_modelUsers->saveRegister($name, $email, $password);
    if($savedb){
        return response()->json(['status' => 'success', 'message' => 'Registered!!']);
    }else{
        return response()->json(['status' => 'error', 'message' => 'Register failed']);
    }
}
    
}

