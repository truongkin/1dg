<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Detail_Order;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $test = DB::table("orders");
        if ($request->nameuser){
            $test = DB::table("users")->select("orders.*")->where('users.name','like',"%$request->nameuser%")->join('orders','orders.users_id','=','users.id');
        }
        if ($request->status !=0){
            $test = $test->select('orders.*')->join('detail_orders','detail_orders.orders_id','=','orders.id')->where("status",$request->status);
        }
        if ($request->from){
            $test = $test->where("orders.created_at",">",Carbon::createFromFormat('d-m-Y', $request->from)->format('Y-m-d')." 00:00:00");
        }
        if ($request->to){
            $test = $test->where("orders.created_at","<=",Carbon::createFromFormat('d-m-Y', $request->to)->format('Y-m-d')." 23:59:59");
        }
        if ($request->iduser){
            $test = $test->where("orders.users_id",$request->iduser);
        }
        if ($request->idorder){
            $test = $test->where("orders.id",$request->idorder);
        }
        if ($request->pageorder){
            $test = $test->distinct('orders.id')->orderBy('updated_at',"DESC")->paginate($request->pageorder);;
        }else{
            $test = $test->distinct('orders.id')->orderBy('updated_at',"DESC")->paginate(50);
        }
        $countnew = count(Detail_Order::where('status',1)->get());

        $countnewuser = count(User::where('created_at','>',Carbon::now()->subDays(30))->get());
        $ratedone = count(Detail_Order::all()) >0 ? (float)(count(Detail_Order::where('status',4)->get())/count(Detail_Order::all())*100) : 0;
        $ratecancel = count(Detail_Order::all()) > 0 ? (float)(count(Detail_Order::where('status',6)->get())/count(Detail_Order::all())*100) :0;
        $ratedone = round($ratedone,2);
        $ratecancel= round($ratecancel,2);
        return view('Backend.index',compact('countnew','countnewuser','ratedone','ratecancel','test'));
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
    public function updateRefun(Request $request){
        $data = Detail_Order::find($request->id);
        $refund = User::find(Order::find($data->orders_id)->users_id);
        $refund->total = ($refund->total) - ($data->refund) + $request->refund;
        $refund->save();
        $data->refund = $request->refund;
        $data->save();
//        Order::find($request->order_id)
        return response()->json([
            'type'    => 'success',
            'content' => "Hoàn trả thành công",
        ]);
    }
    public function updateamountstart(Request $request){
        $data = Detail_Order::find($request->id);
        $data->amount_start = $request->data;
        $data->save();
        return response()->json([
            'type'    => 'success',
            'content' => "Cập nhật thành công",
        ]);
    }
    public function updatestatus(Request $request){
        $data = Detail_Order::find($request->id);
        $data->status = $request->status;
        $data->save();
        return response()->json([
            'type'    => 'success',
            'content' => "Cập nhật thành công",
        ]);
    }
    public function updateamountcom(Request $request){
        $data = Detail_Order::find($request->id);
        $data->amount_com = $request->amount_com;
        $data->save();
        return response()->json([
            'type'    => 'success',
            'content' => "Cập nhật thành công",
        ]);
    }
}
