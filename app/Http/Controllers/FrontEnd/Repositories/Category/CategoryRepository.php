<?php

namespace App\Http\Controllers\FrontEnd\Repositories\Category;

use App\Http\Controllers\FrontEnd\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getCategory()
    {
        return $this->model->take(2)->get();
    }
}