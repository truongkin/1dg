<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function get()
    {
        return response()->json([
            'status' => 'success',
            'data'  => Bank::all()
        ], 200);
    }
    public function getOne(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'data'  => Bank::find( $request->id)
        ], 200);
    }
}
