<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'template',
        'description',
        'others',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema',
        'status',
        'banner_small_title',
        'banner_big_title',
        'banner_description',
        'banner_link_text',
        'banner_link_url',
        'banner_social',
    ];
}