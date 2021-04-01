<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Response;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cates = DB::table("categorys");
        if ($request->category){
            $cates = $cates->where("name","like","%$request->category%");
        }
        if ($request->pageorder){
            $cates = $cates->orderBy("created_at","DESC")->paginate($request->pageorder);
        }else{
            $cates = $cates->orderBy("created_at","DESC")->paginate(50);
        }
        return view('Backend.category',compact("cates"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Category::get();

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
            Category::create($request->all());
            return response()->json([
                'type'    => 'success',
                'content' => 'Thêm thành công',
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
            Category::find($id)->update($request->all());
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
    public function destroy(Request  $request,$id)
    {
        //
        if ($request->ajax()){
            $services = Category::find($request->id)->services;
            foreach($services as $item){
                Service::find($item->id)->delete();
            }
            Category::find($request->id)->delete();
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
