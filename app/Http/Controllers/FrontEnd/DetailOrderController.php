<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Detail_Order;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    public function addDetailOrder($array)
    {
        try {
            $array['created_at'] =new \DateTime();
            $array['updated_at'] =new \DateTime();
            //Detail_Order::insert($array);
            $id = Detail_Order::insert($array);
            return $id;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
    }
}
