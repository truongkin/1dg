<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    use HasFactory;
    protected $table    =   'orders';
    protected $fillable =   ['id','users_id','total'];

    public function detailorder(){
        return $this->hasMany('App\Models\Detail_Order','orders_id','id');
    }
}
