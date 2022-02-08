<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'shoe_code', 'category_id', 'suitable_gender', 'image', 'status'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attr()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes', 'product_id', 'attributes_id');
    }
}
