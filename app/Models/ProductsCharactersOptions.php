<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCharactersOptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_character_id', // Belongs to which characteristic
        'label',                     // Display text (e.g. "Для офиса")
        'value',                     // Optional machine value (could be same as label)
        'sort_order'
    ];

    /**
     * Each option belongs to one characteristic.
     */
    public function characteristic()
    {
        return $this->belongsTo(ProductsCharacters::class);
    }

    /**
     * Many products can have this option (multiselect case).
     */
    public function products()
    {
        return $this->belongsToMany(Products::class, 'product_characteristic_option_product')
            ->withTimestamps();
    }
}
