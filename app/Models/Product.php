<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\ProductStatus;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

     protected $fillable = [
        'name', 'description', 'price', 'status', 'category_id', 'brand_id', 'cover'
    ];

    protected function casts(): array
    {
        return [
            'status' => ProductStatus::class
        ];
    }

    public function scopeSearch($query, $value) {
        $query->where('name', 'like', "%{$value}%")
        ->orWhere('price', 'like', "%{$value}%");
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
