<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'user_id', 'fName', 'lName', 'email', 'phone', 'token'];

    public function checkToken($token){
        if($this->token == $token){
            $this->done = true;
            $this->save();

            return true;
        }
        else{
            return false;
        }
    }
}
