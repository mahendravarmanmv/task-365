<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'lead_name',
        'lead_email',
        'lead_phone',
        'lead_notes',
        'location',
        'business_name',
        'industry',
        'website_type',
        'features_needed',
        'reference_website',
        'budget_min',
        'budget_max',
        'lead_cost',
        'stock',
        'button_text',
        'service_timeframe',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

