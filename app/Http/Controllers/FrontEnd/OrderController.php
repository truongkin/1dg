<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Detail_Order;
use App\Models\Order;
use App\Models\Service;
use App\Utilities\Functions;
use App\Utilities\Validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    public $class_detail_order;
    public $class_account;
    public function __construct()
    {
        $this->class_detail_order = new DetailOrderController();
        $this->class_account = new AccountController();
    }
    public function index(Request $request)
    {
        $dataQuery = $request->all();
        $order_id = (!empty($request->input('seach_order_id'))) ? $request->input('seach_order_id') : null;
        $status = $request->input('status');
        if($status==0) $status = null;

        $time_start = $request->time_start;
        $time_end = $request->time_end;
        
        if(!empty( $time_start) && !empty( $time_end)){
            $time_start =  $time_start." 00:00:01";
            $time_end =  $time_end." 23:59:59";
            $dataQuery['time_start'] = $request->time_start;
            $dataQuery['time_end'] = $request->time_end;
        }else{
            $time_start = null;
            $time_end = null;
            $dataQuery['time_start'] = null;
            $dataQuery['time_end'] = null;
        }
        // dd($dataQuery);
        $order = Order::where('users_id' , Auth::user()->id)->get();
        $order_id_list = array();
        foreach($order as $row_order){
            $order_id_list[] = $row_order->id;
        }
        $detail_order = new Detail_Order();

        unset($dataQuery['page']);
        $limit = isset($request->limit) ? $request->limit : 100;
        $detail_order =  $detail_order->seachOrder( $limit ,$order_id_list , $order_id ,$time_start ,$time_end ,$status);
        // dd($detail_order->toArray());
        return view('frontend.order.index',compact('detail_order','dataQuery'));
    }
    public function handleAddOrder(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'sid' => 'required|numeric',
                'link' => 'required|max:255',
                'quantity'=>'required|numeric'
            ],[
                'sid.required'=>trans('message.Hãy điền đầy đủ dữ liệu'),
                'sid.numeric'=>trans('message.Dữ liệu không hợp lệ'),
                'link.required'=>trans('message.Link không được để trống'),
                'link.max'=>trans('message.Link không hợp lệ'),
                'quantity.required'=>trans('message.Số lượng không được để trống'),
                'quantity.numeric'=>trans('message.Số lượng không hợp lệ'),
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message'  =>  Validate::custom_mess_validate($validator),
                ], 200);
            }
            //check service
            if(ServiceController::isService($request->sid)==false){
                return response()->json([
                    'status' => 'error',
                    'message'  => trans('message.Dịch vụ không hợp lệ'),
                ], 200);
            }
            $service = Service::find($request->sid);
            //check quanti service
            if(ServiceController::checkQuantityMaxMin($request->sid , $request->quantity)==false){
                return response()->json([
                    'status' => 'error',
                    'message'  => trans('message.Số lượng đặt hàng không hợp lệ' ,['1'=>$service->min ,'2'=>$service->max]),
                ], 200);
            }
            $total_service = ($request->quantity * $service->price_service) / 1000;

            //checkAmountUser
            if(PaymentController::checkAmountUser($total_service)==false){
                return response()->json([
                    'status' => 'error',
                    'message'  => trans("message.Số tiền không đủ"),
                ], 200);
            }

            //add table order
            $id_order = $this->addOrder(array('users_id'=>Auth::user()->id , 'total'=>$total_service));
            
            //add table detail order
            $array = array(
                'orders_id'=>$id_order , 
                'services_id'=>$request->sid , 
                'link'=>$request->link ,
                'price_service'=>$service->price_service,
                'amount'=>$request->quantity,
                'amount_start'=>0,
                'refund'=>0,
                'amount_com'=>0,
                'services_name'=>$service->name,
                'status'=>1
            );
            
            $this->class_detail_order->addDetailOrder($array);

            //deduction monney accounts
            $this->class_account->deductionMoney($total_service);

            //update total_amount_paid account
            $this->class_account->setTotalAmountPaid($total_service);

            //update setTotalAmountPaid
            $this->class_account->setTotalOrder();

            return response()->json([
                'status' => 'success',
                'message'  => trans('message.Tạo đơn hàng thành công'),
            ], 200);

        }catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message'  => $th->getMessage (),
            ], 200);
        }


    }
    public function handleAddOrders(Request $request)
    {
       
        try {
            $response = array();
            $id_order = $this->addOrders($request->orders);
            
            foreach ($request->orders as $key=>$order){
                $arr = explode("|" , $order);
                $response[$key]['data'] = $order;
                $sid = isset($arr[0]) ? trim($arr[0]) : 0;
			 	$link = isset($arr[1]) ? trim($arr[1]) : '';
                $quantity = isset($arr[2]) ? trim($arr[2]) : 0;
                 //check service
                if(ServiceController::isService($sid)==false){
                    $response[$key]['status'] = 'error';
                    $response[$key]['message'] = trans('message.Dịch vụ không hợp lệ');
                    continue;
                }
                $service = Service::find($sid);
                //check quanti service
                if(ServiceController::checkQuantityMaxMin($sid , $quantity)==false){
                    $response[$key]['status'] = 'error';
                    $response[$key]['message'] = trans('message.Số lượng đặt hàng không hợp lệ' ,['1'=>$service->min ,'2'=>$service->max]);
                    continue;
                }
        
                
                if($id_order!=false){
                    //add table detail order
                    $array = array(
                        'orders_id'=>$id_order , 
                        'services_id'=>$sid , 
                        'link'=>$link ,
                        'price_service'=>$service->price_service,
                        'amount'=>$quantity,
                        'amount_start'=>0,
                        'refund'=>0,
                        'amount_com'=>0,
                        'services_name'=>$service->name,
                        'status'=>1
                    );
                    $this->class_detail_order->addDetailOrder($array);
                    $response[$key]['status'] = 'success';
                    $response[$key]['message'] = trans('message.Tạo đơn hàng thành công');
                }else{
                    $response[$key]['status'] = 'error';
                    $response[$key]['message'] = trans("message.Số tiền không đủ");
                }
                
                
            }
            return response()->json([
                'status' => 'success',
                'message'  => $response
            ], 200);
        }catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message'  => $th->getMessage (),
            ], 200);
        }
    }
    public function addOrder($array)
    {
        try {
            $id = Order::create($array)->id;
            return $id;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function addOrders($data)
    {
        $money_all = 0;
        foreach ($data as $order){
            $arr = explode("|" , $order);
            $sid = isset($arr[0]) ? trim($arr[0]) : 0;
            $link = isset($arr[1]) ? trim($arr[1]) : '';
            $quantity = isset($arr[2]) ? trim($arr[2]) : 0;
            if(ServiceController::isService($sid)==false){
                continue;
            }
            //check quanti service
            if(ServiceController::checkQuantityMaxMin($sid , $quantity)==false){
                continue;
            }
    
            $service = Service::find($sid);
    
            $money_all += ($quantity * $service->price_service) / 1000;
        }
        
        if(PaymentController::checkAmountUser($money_all)==true){
            $id_order = $this->addOrder(array('users_id'=>Auth::user()->id , 'total'=>$money_all));

            //deduction monney accounts
            $this->class_account->deductionMoney($money_all);

            //update total_amount_paid account
            $this->class_account->setTotalAmountPaid($money_all);
            
            //update setTotalAmountPaid
            $this->class_account->setTotalOrder();
            return $id_order;
        }
        return false;
    }
}
