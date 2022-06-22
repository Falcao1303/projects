<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lib\Model\Prepare;
use Carbon\Carbon;

class OperationsModel extends Model{


    public function resetAccounts(){
        return DB::select('DELETE  FROM `testes`.bank');
    }

    public function getRegisters($id){
        return DB::select('SELECT *  FROM `testes`.bank WHERE id = ?', [$id]);
    }

    public function getBalance($id){
        return DB::select('SELECT balance  FROM `testes`.bank WHERE id = ?', [$id]);
    }

    public function createAccount($id,$amount,$date){
        return DB::insert('INSERT INTO `testes`.bank (id,balance,created_at) VALUES (?,?,?)', [$id,$amount,$date]);
    }

    public function transactions($id,$ammount,$date,$type){
        return DB::insert('INSERT INTO `testes`.bank_transactions (id_account,ammount_value,created_at,type_transaction) VALUES (?,?,?,?)', [$id,$ammount,$date,"$type"]);
    }

    public function deposit($id,$amount){
        return DB::update('UPDATE `testes`.bank SET balance = balance + ? WHERE id = ?', [$amount,$id] );
    }

    public function withdraw($id,$amount){
        return DB::update('UPDATE `testes`.bank SET balance = balance - ? WHERE id = ?', [$amount,$id]);
    }
}