<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = [
        'portfolio_category_id',
        'title',
        'slug',
        'client_name',
        'url',
        'status',
        'image',
        'order',
        'industry',
        'services',
        'tags',
        'description',
        'challenges',
        'solutions',
        'impact',
        'image_color',
    ];

    protected $casts = [
        'services' => 'array',
        'tags' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }
}
