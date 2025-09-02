<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsCharacters extends Model
{
    use hasFactory;

    protected $fillable = [
        'name',          // Display name (e.g. "Вес")
        'slug',          // Machine key (e.g. "weight")
        'type',          // Data type (string, integer, select, multiselect, etc.)
        'unit',          // Optional unit (e.g. "кг", "ГБ")
        'is_filterable', // Show in filters?
        'sort_order'     // UI order
    ];

    /**
     * A characteristic can have many possible options (for select/multiselect).
     * Example: "Класс" has options "Для офиса", "Для учебы", ...
     */
    public function options()
    {
        return $this->hasMany(ProductsCharactersOptions::class,'product_character_id', 'id');
    }


    /**
     * A characteristic can have many values assigned to products.
     * Example: "Вес = 1.9 кг" for Product #1.
     */
    public function values()
    {
        return $this->hasMany(ProductsCharactersValues::class,'product_character_id', 'id');
    }
}
