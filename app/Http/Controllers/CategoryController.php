<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    public function index()
    {
        try {
            // Извлекаем все категории верхнего уровня вместе с их дочерними категориями и продуктами.
            $categories = Category::with('children.products')->whereNull('parent_category_id')->get();
            
            // Возвращаем JSON ответ, содержащий категории и связанные с ними данные.
            return response()->json($categories);
        } catch (\Exception $e) {
            // Если возникает исключение, возвращаем ответ с сообщением об ошибке.
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }
    
}

