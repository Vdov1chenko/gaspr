<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseReportController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Отображение списка всех категорий с товарами, чтобы была видна вложенность.
Route::get('/categories', [CategoryController::class, 'index']);

// Генерация отчета покупок (по дням, количество покупок за последний месяц) в формате json или csv
Route::get('/reports/purchases/{format}', [PurchaseReportController::class, 'generateReport']);

// Метод перемещения товара в другую категорию
Route::put('/products/{product}/move-to-category/{category}', [ProductController::class, 'moveToCategory']);