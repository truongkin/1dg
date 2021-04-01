<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\Account\ChangePassWord;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public $auth;
    public function __construct()
    {
        $this->auth = Auth::user();
    }
    public function account()
    {
        return view('frontend.account.index');
    }
    function changePassword(ChangePassWord $request)
    {
        if(!$this->comparison_password($request->old_password , Auth::user()->password)){
           return redirect()->back()->with('error',trans('message.Mật khẩu cũ không đúng')); 
        }
        $array = array(
            'password' => Hash::make($request->password)
        );
        User::where('id' , Auth::user()->id)->update($array);
        return redirect()->back()->with('success',trans('message.Thay đổi mật khẩu thành công')); 
    }
    public function comparison_password($password_old , $password_new)
    {
        if (Hash::check($password_old, $password_new)) {
            return true;
        }
        return false;
    }
    public static function checkAmountUser($price)
    {
        if(Auth::user()->total >= $price) return true;
        return false;
    }
    public function deductionMoney($price)
    {
        $money_old = Auth::user()->total;
        if($this->checkAmountUser($price)){
            $array = array('total'=>$money_old - $price);
            User::where('id',Auth::user()->id)->update($array);
        }
    }
    public function getAccount()
    {
        $level = Level::find(Auth::user()->levels_id);
        Auth::user()->name_level = $level->name;
        return response()->json([
            'status' => 'success',
            'data'  => Auth::user()
        ], 200);
    }
    public function setTotalAmountPaid($price)
    {
        $money_old = Auth::user()->total_amount_paid;
        $array = array('total_amount_paid'=>$price + $money_old);
            User::where('id',Auth::user()->id)->update($array);
    }
    public function setTotalOrder()
    {
        $total_orders = Auth::user()->total_orders;
        $array = array('total_orders'=> 1 + $total_orders);
            User::where('id',Auth::user()->id)->update($array);
    }
    public function getLevel()
    {
        $level = Level::find(Auth::user()->levels_id);
    }
}
