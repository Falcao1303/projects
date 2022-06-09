<?php

namespace App\Http\Controllers\Bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OperationsModel;
use Exception;

class OperationsController extends Controller{


    private $_modelAccounts;

    public function __construct(){
        $this->_modelAccounts = new OperationsModel();
    }

    public function resetRegisters(){
        $reset = $this->_modelAccounts->resetAccounts();
        return json_encode($reset,200);
    }

    public function getRegisters(Request $request){
            $id = $request->query('id');
            $account = $this->_modelAccounts->getRegisters($id);
             if(sizeof($account) === 0){
                 throw new Exception("Account not found", 404);
             }else{
                 return json_encode($account,200);
             }      
    }

    public function event(Request $request){
        $id = $request->input('id');
        $destination = $request->input('destination');
        $amount = $request->input('ammount');
        $type = $request->input('type');
        $date = date("Y-m-d H:i:s");

        $account = $this->_modelAccounts->getRegisters($destination);
            if($type == ''){
                $creatAccount = $this->_modelAccounts->createAccount($id, $amount,$date);
                return json_encode($creatAccount,200);
            }

            if(sizeof($account) === 0){
                return throw new Exception("Account not found", 404);
            }else{
                if($type == 'deposit'){
                    $insertDepositTransaction = $this->_modelAccounts->transactions($destination, $amount,$date,$type);
                    $deposit = $this->_modelAccounts->deposit($destination, $amount,$date);
                    return json_encode($insertDepositTransaction,$deposit,201);
                }else{
                    $insertWithdrawTransaction = $this->_modelAccounts->transactions($destination, $amount,$date,$type);
                    $withdraw = $this->_modelAccounts->withdraw($destination, $amount,$date);
                    return json_encode($insertWithdrawTransaction,$withdraw,201);
                }
            }

    
    }
    
}

