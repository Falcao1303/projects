<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\UsersModel;

class HomeController extends Controller{


private $_modelUsers;

public function __construct(){
     $this->_modelUsers = new UsersModel();
}

public function index(){
        return view('home');
}

}