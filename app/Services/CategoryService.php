<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryService
{

    public function getAllCategories() : Collection
    {
        return Category::all();
    }

}
