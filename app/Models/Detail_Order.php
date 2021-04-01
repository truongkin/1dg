<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Order extends Model
{
    use HasFactory;
    protected $table        =   'detail_orders';
    protected $fillable     =   ['id','orders_id','services_id','link','amount','price_service','amount_com','refund','status'];
    protected $appends = ['date_created_at_new'];
    public function order(){
        return $this->hasOne('App\Models\Order');
    }
    function getDateCreatedAtNewAttribute() {
        return Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
    }
    public function seachOrder($order_one_page ,$list ,$order_id=null, $time_start , $time_end , $status = null){

        $data = $this->select("*");

        if($order_id!=null) {
            $data = $data->where('id' , $order_id);
        }
        else{
            if($status!=null){
                $data = $data->where('status', $status );
                
            }
            if($time_start!= null && $time_end !=null){
                $data = $data->whereBetween('created_at', [$time_start, $time_end]);
            }
            $data = $data->whereIn('orders_id',$list);
        }
        return $data->orderBy('orders_id','DESC')->paginate($order_one_page);
    }
}
