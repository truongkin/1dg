<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Order;
use App\Models\Recharge;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table("recharges");
        if ($request->from){
            $data = $data->where("created_at",">",Carbon::createFromFormat('d-m-Y', $request->from)->format('Y-m-d'). " 00:00:00");
        }
        if ($request->to){
            $data = $data->where("created_at","<=",Carbon::createFromFormat('d-m-Y', $request->to)->format('Y-m-d')." 23:59:59");
        }
        if ($request->iduser){
            $data = $data->where('users_id',"=",$request->iduser);
        }
        if ($request->nameuser){
            $data = DB::table("users")->select("recharges.*")->where('users.name','like',"%$request->nameuser%")->join('recharges','recharges.users_id','=','users.id');
        }
        if ($request->pageorder){
            $data = $data->orderBy("created_at","DESC")->distinct()->paginate($request->pageorder);
        }else{
            $data = $data->orderBy("created_at","DESC")->distinct()->paginate(50);
        }

        return view('Backend.recharge',compact('data'));
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
            if (Recharge::create($request->all())){
                $user = User::find($request->users_id);
                $user->total = floatval($user->total) + floatval($request->total);
                $level = Level::where('total_deposits','<=',$user->total)->orderBy('total_deposits','DESC')->first();
                $user->levels_id = $level->id;
                if ($user->save()){
                    return response()->json([
                        'type'    => 'success',
                        'content' => 'Nạp thành công cho '.User::find($request->users_id)->name,
                    ]);
                }

            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        if ($request->ajax()){
            if (User::find($id) != null){
                return response()->json([
                    'type'    => 'success',
                    'data'     => User::find($id),
                    'level'     => Level::where('total_deposits','<=',User::find($id)->total)->orderBy('total_deposits','desc')->first(),
                    'content' => "Tìm thấy thông tin người dùng",
                ]);
            }else{
                return response()->json([
                    'type'    => 'success',

                    'content' => "Không tìm thấy thông tin người dùng",
                ]);
            }

        }
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
}
