<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'description', 'seo_title', 'seo_description', 'seo_keywords', 'seo_schema',  'status'];
}