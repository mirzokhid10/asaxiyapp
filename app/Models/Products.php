<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'child_category_id',
        'name',
        'slug',
        'thumb_image',
        'short_description',
        'long_description',
        'brand_id',
        'qty',
        'sku',
        'price',
        'discount_price',
        'offer_start_date',
        'offer_end_date',
        'product_type',
        'status',
        'is_approved',
        'seo_title',
        'seo_description'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImageGalleries()
    {
        return $this->hasMany(ProductsImageGallery::class, 'product_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductsVariant::class, 'product_id');
    }


    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    // 🔹 New relations for EAV

    /**
     * All characteristic values (typed, single-value per characteristic).
     */
    public function characteristicValues()
    {
        return $this->hasMany(ProductsCharactersValues::class, 'product_id');
    }

    /**
     * All characteristics attached to this product (through values).
     */
    public function characteristics()
    {
        return $this->belongsToMany(ProductsCharacters::class, 'product_characteristic_values')
            ->withPivot([
                'value_string','value_text','value_integer','value_decimal',
                'value_boolean','value_date','option_id'
            ])
            ->withTimestamps();
    }

    /**
     * For MULTISELECT: all options directly linked to this product.
     */
    public function characteristicOptions()
    {
        return $this->belongsToMany(ProductCharacteristicsOptions::class, 'product_characteristic_option_product')
            ->withTimestamps();
    }

}
