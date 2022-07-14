<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Lib\Model\Prepare;
use Carbon\Carbon;

class UsersModel extends Model{


    public function getRegisters(){
        return DB::select('SELECT * FROM `cadastro-teste`.usuarios');
    }


    public function getRegistersLogin($email, $password){
        return DB::select('SELECT * FROM `cadastro-teste`.usuarios where email = ? and senha = ?', [$email, $password]);
    }

    public function saveRegister($name, $email, $password){
        $data = [
            'nome' => $name,
            'email' => $email,
            'senha' => $password
        ];
        return DB::table('cadastro-teste.usuarios')->insert($data);
    }


}