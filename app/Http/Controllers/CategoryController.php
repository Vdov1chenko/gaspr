<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->whereNull('parent_category_id')->get();

        return response()->json($categories);
    }
}