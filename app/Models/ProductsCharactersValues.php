<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCharactersValues extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_character_id',
        'option_id',
        'value_string',
        'value_text',
        'value_integer',
        'value_decimal',
        'value_boolean',
        'value_date'
    ];

    protected $casts = [
        'value_boolean' => 'boolean',
        'value_integer' => 'integer',
        'value_decimal' => 'decimal:2',
        'value_date'    => 'date',
    ];

    /**
     * This value belongs to one product.
     */
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    /**
     * This value belongs to a characteristic.
     */
    public function characteristic()
    {
        return $this->belongsTo(ProductsCharacters::class, 'product_character_id');
    }

    public function option()
    {
        return $this->belongsTo(ProductsCharactersOptions::class, 'option_id');
    }

    /**
     * If it’s a select type, this links to the chosen option.
     */
    public function options()
    {
        return $this->belongsToMany(
            ProductsCharactersOptions::class,
            'product_character_value_option', // pivot table
            'value_id', // foreign key on pivot pointing to values
            'option_id' // foreign key on pivot pointing to options
        )->withTimestamps();
    }
}
