<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'banner_logo',
        'banner_style',
        'banner_url',
        'banner_text',
        'banner_app_image',
        'banner_qr',
        'banner_appstore',
        'banner_googleplay',
    ];
}
