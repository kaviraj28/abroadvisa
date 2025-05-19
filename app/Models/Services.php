<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
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
        'roadmaptitle',
        'roadmapinfo',
        'roadmapimage',
        'industrytitle',
        'industryinfo',
        'projecttitle',
        'projectinfo',
        'faqtitle',
        'faqinfo',
        'faqimage',
        'pricingtitle',
        'pricinginfo',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category', 'id')->oldest('order');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'service', 'id')->oldest('order');
    }
    public function pricing()
    {
        return $this->hasOne(Pricing::class, 'services', 'id');
    }
    public function roadmap()
    {
        return $this->hasMany(Roadmap::class, 'services', 'id')->oldest('order');
    }
    public function industry()
    {
        return $this->hasMany(Industry::class, 'services', 'id')->oldest('order');
    }
}
