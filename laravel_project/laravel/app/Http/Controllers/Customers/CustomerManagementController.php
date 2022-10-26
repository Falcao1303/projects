<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customers\CustomersModel;

class CustomerManagementController extends Controller{

private $_modelCostumers;

public function __construct(){
     $this->_modelCostumers = new CustomersModel();
}

public function registerView(){
        return view('customers/register');
}

}