<?php

namespace App\Utilities;
use Illuminate\Support\Facades\Auth;
class Functions
{
    public static function custom_mess_validate($validator){
        $results = "";
        $messages = $validator->errors()->messages();
        $i = 0;
        foreach ($messages as $key => $value) {
            $results.= $value[0]."<br>";
        }
        return $results;
    }
    public static function getFromDatToDate($data){
        $a = explode(":" ,$data);
        $a[0] = preg_replace('/\s+/', '', $a[0]);
        $a[1]= preg_replace('/\s+/', '', $a[1]);
        foreach ($a as &$con){
            $b = explode("/" , $con);
            $c= implode("-" ,$b );
            $con = $c;
        }
        return $a;
    }

}
