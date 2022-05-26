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

    public function saveRegisters(){
    }


}