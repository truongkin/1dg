<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data=DB::table("posts");
        if ($request->pageorder){
            $data = $data->orderBy("created_at","DESC")->paginate($request->pageorder);
        }else{
            $data = $data->orderBy("created_at","DESC")->paginate(50);
        }
        return view("Backend.news",compact('data'));
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
            if ($request->content == ""){
                return response()->json([
                    'type'    => 'error',
                    'content' => 'Chưa nhập nội dung',
                ]);
            }
            if(News::create($request->all())){
                return response()->json([
                    'type'    => 'success',
                    'content' => 'Thêm thành công',
                ]);
            }

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
            News::find($id)->update($request->all());
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
            News::find($request->id)->delete();
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
