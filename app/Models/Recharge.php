<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    use HasFactory;
    protected $table    =   'recharges';
    protected $fillable =   ['id','users_id','total','total_input','bonus'];

    public function recharge_user(){
        return $this->hasOne('App\Models\Users');
    }
}
