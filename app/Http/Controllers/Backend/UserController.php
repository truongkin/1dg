<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = DB::table("users");
        if ($request->iduser){
            $user = $user->where('id',$request->iduser);
        }
        if ($request->nameuser){
            $user = $user->where('users.name','like',"%$request->nameuser%");
        }
        if ($request->pageorder){
            $user = $user->orderBy("created_at","DESC")->distinct()->paginate($request->pageorder);
        }else{
            $user = $user->orderBy("created_at","DESC")->distinct()->paginate(50);
        }
        return view('Backend.user',compact("user"));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changePass(Request $request)
    {
        if ($request->ajax()){
            User::find($request->id)->update(array(
                'password' => Hash::make($request->password)
            ));
            return response()->json([
                'type'    => 'success',
                'content' => "Đổi mật khẩu thành công",
            ]);
        }else{
            return response()->json([
                'type'    => 'error',
                'content' => "Không phải ajax",
            ]);
        }
    }
}
