<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'image',
        'zip_file',
        'file_name',
        'created_by',
        'version',
        'license_type',
        'change_log',
        'languages',
        'total_downloads',
        'uploaded_by',
        'sub_category',
        'main_image',
        'overview',
        'features',
        'system_requirements',
    ];
    protected $casts = [
         'features' => 'array',
         'system_requirements' => 'array',
        ];
        
}
