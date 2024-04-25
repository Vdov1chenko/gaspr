<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'parent_category_id'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function allProducts()
    {
        $products = $this->products;

        $this->load('children.allProducts');

        $this->children->each(function ($child) use (&$products) {
            $products = $products->merge($child->allProducts());
        });

        return $products;
    }
}
