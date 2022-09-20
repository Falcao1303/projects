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
        return view('login');
}


public function getUser(Request $request){
        try{
            $email = $request->query('email');
            $password = $request->query('password');
            $user = $this->_modelUsers->getRegistersLogin($email, $password);
            $request->session()->put('UserInformation', $user[0]);
            $session = $request->session()->get('UserInformation');
            if($user){
                return response()->json(['user'=>$user,'status' => 'success', 'message' => 'Login success','session' => $session]);
            }else{
            return response()->json(['status' => 'error', 'msg' => 'Login failed']);
            }
        }catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }   
}