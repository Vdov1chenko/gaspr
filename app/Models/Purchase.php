<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id',  // идентификатор пользователя, совершившего покупку
        'product_id', // идентификатор продукта, который был куплен
        'quantity', // количество купленных продуктов
        'price', // цена одного продукта
        'created_at', // дата и время совершения покупки
        'updated_at', // дата и время последнего обновления записи
    ];

    // Определение отношений с другими моделями, если это необходимо
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
