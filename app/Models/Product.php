<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
        'icon',
        'category',
        'subcategory',
        'launch_date',
        'rating',
        'size',
        'download_link',
        'is_active',
        'version',
        'total_downloads',
        'version_details',
        'language',
        'pass_code',
        'display_picture',
        'details',
        'tags',
        'description',
        'additional_tags',
    ];

    protected $casts = [
        'launch_date' => 'date',
        'rating' => 'float',
        'is_active' => 'boolean',
    ];
}
