<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = ['id','category_id','name','min','max','price_service','note','speed_date','guarantee','time_start','quality'];
    public function categorys(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }
}
