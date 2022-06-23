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
        return response('OK',200);
    }

    public function getRegisters(Request $request){
            $id = $request->query('account_id');
            $account = $this->_modelAccounts->getBalance($id);
             if(sizeof($account) === 0){
                 return response(sizeof($account), 404);
             }else{
                 return response($account[0]->balance,200);
             }      
    }

    public function event(Request $request){
        $id = $request->input('account_id') == '' ? $request->input('destination') : $request->input('id');
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $amount = $request->input('amount');
        $type = $request->input('type');
        $date = date("Y-m-d H:i:s");
        $account2 = 300;
        $account2balance = 0;

  
            if($origin == ''){
                $account = $this->_modelAccounts->getRegisters($destination);              
                if($type == '' || $type == 'deposit' && sizeof($account) === 0){
                    $this->_modelAccounts->createAccount($id, $amount,$date);
                    return response(['destination' => ['id' => $id,'balance' => $amount]],201);
                }
                if(sizeof($account) === 0){
                    return response(sizeof($account), 404);
                }
            }

                if($type == 'deposit'){
                    $this->_modelAccounts->transactions($destination, $amount,$date,$type);
                    $this->_modelAccounts->deposit($destination, $amount,$date);
                    $actualbalance = $account[0]->balance;
                    return response(['destination' => ['id' => $id,'balance' => $actualbalance + $amount]],201);
                }else if($type == 'withdraw'){
                    $destination = $destination == '' ? $origin : $destination;
                    $account = $this->_modelAccounts->getRegisters($destination);
                    if(sizeof($account) === 0){
                        return response(sizeof($account), 404);
                    }
                    $this->_modelAccounts->transactions($origin, $amount,$date,$type);
                    $this->_modelAccounts->withdraw($origin, $amount);
                    return response(['origin'=>['id'=>$origin,'balance'=> $account[0]->balance - $amount]],201);
                }else{
                    $account = $this->_modelAccounts->getRegisters($origin);
                    if(sizeof($account) === 0){
                        return response(sizeof($account), 404);
                    }else{
                        $this->_modelAccounts->createAccount($account2,$account2balance,$date);
                        $this->_modelAccounts->withdraw($origin, $amount);                        
                        $this->_modelAccounts->deposit($destination, $amount,$date);
                        return response(['origin'=>['id'=>"100", 'balance'=> $account[0]->balance - $amount], 'destination' => ['id'=>"$account2", 'balance'=>$account2balance + $amount]],201);
                    }



                }
            

    
    }
    
}

