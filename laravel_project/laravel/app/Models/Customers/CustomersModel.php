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

    public function filterCustomers($data){
        return DB::table('cadastro-teste.clientes')->where('name', 'like', '%'.$data['filter'].'%')->get();
    }

    public function countCostumers(){
        return DB::table('cadastro-teste.clientes')->count();
    }

    public function listCustomers(){
        return DB::table('cadastro-teste.clientes')->get();
    }

    public function updateCustomer($data){
        return DB::table('cadastro-teste.clientes')->where('idcostumer', $data['idcostumer'])->update($data);
    }

    public function deleteCustomer($data){
        return DB::table('cadastro-teste.clientes')->where('idcostumer', $data[0])->delete();
    }

}