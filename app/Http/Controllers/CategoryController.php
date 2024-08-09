<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function apiIndex()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories
        ]);
    }
}
