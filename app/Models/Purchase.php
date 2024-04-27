<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $fillable = ['product_id', 'quantity', 'price', 'purchase_date'];

    // Метод для получения покупок за последний месяц
    public static function purchasesLastMonth()
    {
        return self::where('purchase_date', '>=', now()->subMonth())->get();
    }
}
