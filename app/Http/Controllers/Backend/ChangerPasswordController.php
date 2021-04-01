<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use Hash;
class ChangerPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "a";
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
        $check = 0;
        if ($request->ajax()){
            if ($request->oldpassword ==""){
                return response()->json([
                    'type'    => 'error',
                    'title'   => 'Lỗi',
                    'content' => 'Pass cũ không được để chống',
                ]);
            }else if(!Hash::check($request->oldpassword,Auth::guard('admin')->user()->password)){
                return response()->json([
                    'type'    => 'error',
                    'title'   => 'Lỗi',
                    'content' => 'Pass cũ nhập sai',
                ]);
            }else if($request->newpassword ==""){
                return response()->json([
                    'type'    => 'error',
                    'title'   => 'Lỗi',
                    'content' => 'Pass mới không được để chống',
                ]);
            }else if($request->confirmnewpassword ==""){
                return response()->json([
                    'type'    => 'error',
                    'title'   => 'Lỗi',
                    'content' => 'Chưa xác nhận mật khẩu',
                ]);
            }else if($request->confirmnewpassword != $request->newpassword){
                return response()->json([
                    'type'    => 'error',
                    'title'   => 'Lỗi',
                    'content' => 'Nhập lại mật khẩu sai',
                ]);
            }
            $admin = Admin::find($id);
            $admin->password = \Illuminate\Support\Facades\Hash::make($request->confirmnewpassword);
            if ($admin->save()){
                return response()->json([
                    'type'    => 'success',
                    'title'   => 'Thành công',
                    'content' => 'Đổi mật khẩu thành công',
                ]);
            }

        }else{
            return response()->json([
                'type'    => 'error',
                'title'   => 'Lỗi',
                'content' => 'Không phải ajax',
            ]);
        }

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
    /* process validator password */
    public function validatorPassword($request)
    {
        $validator = Validator::make($request->all(), [
            'password_old' => 'required',
            'password_new' => 'required',
            'password_repeat' => 'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'type'    => 'warning',
                'title'   => 'Cảnh báo',
                'content' => $validator->errors->all()[0],
            ]);
        }
        else return '';
    }
    public function checkpass(Request $request){
        if($request->ajax()){
            $user = Admin::find($request->id);
            $hasher = app('hash');
            if ($hasher->check($request->pass, $user->password)) {
                return "true";
            }else{
                return "false";
            }
        }
    }
}
