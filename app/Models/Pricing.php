<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'services',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema',
        'order',
        'status',
        'banner_small_title',
        'banner_big_title',
        'banner_description',
        'banner_link_text',
        'banner_link_url',
        'banner_social',
    ];

    public function prices()
    {
        return $this->hasMany(PricingItem::class, 'pricing_id');
    }
}
