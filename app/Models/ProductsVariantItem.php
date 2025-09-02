<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsVariantItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_variant_id',
        'name',
        'price',
        'is_default',
        'status',
    ];

    public function variant()
    {
        return $this->belongsTo(ProductsVariant::class, 'product_variant_id');
    }

}
