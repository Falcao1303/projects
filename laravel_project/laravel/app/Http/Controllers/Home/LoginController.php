<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\UsersModel;

class LoginController extends Controller{


private $_modelUsers;

public function __construct(){
     $this->_modelUsers = new UsersModel();
}

public function index(){
        return view('home');
}


public function getUser(Request $request){
        try{
            $email = $request->query('email');
            $password = $request->query('password');
            $user = $this->_modelUsers->getRegisters($email, $password);
            return response()->json(['status' => 'success', 'data' => $user]);
        }catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }   
}