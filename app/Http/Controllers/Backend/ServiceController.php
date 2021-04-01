<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use function MongoDB\BSON\toJSON;
use DB;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = DB::table("services");

        if ($request->service){
            $data = $data->where('name',"like","%$request->service%");
        }
        if ($request->category){
            $data = $data->where('category_id',"=",$request->category);
        }
        if ($request->pageorder){
            $data = $data->orderBy("created_at","DESC")->paginate($request->pageorder);
        }else{
            $data = $data->orderBy("created_at","DESC")->paginate(50);
        }
//        return $data;
//        $listData = [];
        $cates = Category::get();
//        foreach ($cates as $cate){
//            array_push($listData,$cate);
//            if (count($cate->services)) {
//                foreach ($cate->services as $service) {
//                    array_push($listData,$service);
//                }
//            }
//        }

        return view('Backend.service',compact('data','cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->ajax()){
            if ($request->note == ""){
                return response()->json([
                    'type'    => 'error',
                    'content' => 'Chưa nhập mô tả',
                ]);
            }
            Service::create($request->all());
            return response()->json([
                'type'    => 'success',
                'content' => 'Thành công',
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->ajax()){
            Service::find($id)->update($request->all());
            return response()->json([
                'type'    => 'success',
                'content' => "Sửa thành công",
            ]);
        }else{
            return response()->json([
                'type'    => 'error',
                'content' => "Không phải ajax",
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        if ($request->ajax()){
            Service::find($request->id)->delete();
            return response()->json([
                'type'    => 'success',
                'content' => "Xóa thành công",
            ]);
        }else{
            return response()->json([
                'type'    => 'error',
                'content' => "Không phải ajax",
            ]);
        }

    }
}
