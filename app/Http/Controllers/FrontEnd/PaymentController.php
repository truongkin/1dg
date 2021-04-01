<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public static function checkAmountUser($price)
    {
        if(Auth::user()->total >= $price) return true;
        return false;
    }
    
}
