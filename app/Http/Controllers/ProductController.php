<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function moveToCategory(Request $request, Product $product, Category $category)
{
    try {
        // Проверяем, существует ли товар
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Проверяем, существует ли категория
        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        // Перемещаем товар в новую категорию
        $product->category_id = $category->id;
        $product->save();

        return response()->json(['message' => 'Товар перемещен в новую категорию успешно']);
    } catch (\Exception $e) {
        // Если возникает исключение, возвращаем ответ с сообщением об ошибке.
        return response()->json(['error' => 'Something went wrong.'], 500);
    }
}

}
