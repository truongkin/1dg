<?php

namespace App\Utilities;
use Illuminate\Support\Facades\Auth;
class Validate
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
}
