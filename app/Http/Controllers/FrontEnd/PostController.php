<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getListPost(Request $request)
    {
        $post = Post::orderBy('id',"DESC")->get();
        foreach ($post as &$con){
            $con->ngay_tao = $con->created_at->format('Y-m-d H:i:s');
        }
        return response()->json([
            'status' => 'success',
            'data'  => $post,
        ], 200);
    }
}
