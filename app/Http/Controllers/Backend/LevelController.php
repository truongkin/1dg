<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $level = Level::all();
        return view("Backend.level",compact("level"));
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
            Level::create($request->all());
            return response()->json([
                'type'    => 'success',
                'content' => 'Thêm thành công',
            ]);
        }else{
            return response()->json([
                'type'    => 'error',
                'content' => "Không phải ajax",
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
            Level::find($id)->update($request->all());
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
            Level::find($request->id)->delete();
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
