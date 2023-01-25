<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lib\Model\Prepare;
use Carbon\Carbon;

class CustomersModel extends Model{

    public function customerRegister($data){
        return DB::table('cadastro-teste.clientes')->insert($data);
    }

    public function countCostumers(){
        return DB::table('cadastro-teste.clientes')->count();
    }

}