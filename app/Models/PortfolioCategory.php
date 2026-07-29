<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'order',
    ];

    public function projects()
    {
        return $this->hasMany(PortfolioProject::class, 'portfolio_category_id');
    }
}
