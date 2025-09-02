<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'status',
    ];

    public function variantItems()
    {
        return $this->hasMany(ProductsVariantItem::class, 'product_variant_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
