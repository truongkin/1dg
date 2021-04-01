<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FundsController extends Controller
{
    public function index()
    {
        $funds = Recharge::where('users_id', Auth::user()->id)->get();
        $Deposit = Recharge::where('users_id', Auth::user()->id)->sum('total_input');
        $Bonus = Recharge::where('users_id', Auth::user()->id)->sum('bonus');
        $Spent = Recharge::where('users_id', Auth::user()->id)->sum('total');
        return view('frontend.funds.index' ,compact('Deposit','Bonus','Spent','funds'));
    }
}
