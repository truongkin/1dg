<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Level;
use App\Models\Service;

class NewController extends Controller
{
    protected $categoryRepo;

    // public function __construct()
    // {
    //     $this->categoryRepo = $categoryRepo;
    // }
    
    public function index()
    {
        
        $list_category = Category::all();
        $list_service = Service::where('category_id' , $list_category->first()->id)->get();
        $levels = Level::all();
        $first_service = $list_service->first();
        return view('frontend.new.index' , compact('list_category','list_service' ,'first_service','levels'));
    }
}
