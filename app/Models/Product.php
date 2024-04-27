<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'product_name', 'price'];

    public function category()
    {
        return $this->belongsTo(TypeProduct::class);
    }

    public function moveToCategory(Category $category)
    {
        $this->category_id = $category->id;
        $this->save();
    }
}
