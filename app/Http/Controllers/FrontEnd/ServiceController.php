<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getAll()
    {   
        
        $category = Category::all();
        $total_service = Service::all()->count();
        return view('frontend.service.index' , compact('category','total_service'));
    }
    public function getDetailService(Request $request)
    {
        $service = Service::findOrFail($request->id);
        return response()->json([
            'status' => 'success',
            'data'  => $service,
        ], 200);
    }
    public function getListServiceByCategory(Request $request)
    {
        $service = Service::where('category_id' , $request->catid)->get();
        foreach($service as &$con){
            $con->name = htmlspecialchars($con->name);
        }
        return response()->json([
            'status' => 'success',
            'data'  => $service,
        ], 200);
    }
    public function seach(Request $request)
    {
        if($request->key == null){
            $service = Service::all();
        }else{
            $service = Service::where('name', 'like', '%' . $request->key . '%')->get();
        }
        
        $list_id_services =  array_unique(array_column($service->toArray(), 'id'));
        $list_id_category =  array_unique(array_column($service->toArray(), 'category_id'));
        $data = null;
        if($service->count() > 0){
            $data = Category::whereIn('id' , $list_id_category)->get();
            foreach($data as &$row){
                $row->services = Service::where('category_id' , $row->id)->whereIn('id', $list_id_services)->get();
            }
        }
        return response()->json([
            'status' => 'success',
            'data'  => $data,
            'count'=>$service->count(),
            'name_btn' => trans('message.Chi tiết btn')
        ], 200);
    }
    public static function isService($ids)
    {
        $service = Service::find($ids);
        if(!empty($service)) return true;
        return false;
    }
    public static function checkQuantityMaxMin($ids ,$quantity)
    {
        $service = Service::find($ids);
        if($quantity <= $service->max && $quantity >=  $service->min) return true;
        return false;
    }
}
