<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model
{
    use HasFactory;
    protected $table = 'product_attributes';
    protected $fillable = ['product_id', 'attributes_id', 'quantity'];
}
