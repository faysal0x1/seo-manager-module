<?php

namespace App\Modules\SeoManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'context',
        'route_name',
        'seoable_type',
        'seoable_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots',
        'og_title',
        'og_description',
        'og_type',
        'og_url',
        'og_image',
        'og_image_url',
        'og_image_alt',
        'og_site_name',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'twitter_image_url',
        'twitter_site',
        'twitter_creator',
        'schema_markup',
        'extras',
        'is_active',
    ];

    protected $casts = [
        'extras'    => 'array',
        'is_active' => 'boolean',
    ];
}


