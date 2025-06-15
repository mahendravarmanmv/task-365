<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\WebsiteType;

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

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function websiteType()
    {
        return $this->belongsTo(WebsiteType::class, 'website_type');
    }

    /**
     * Use this instead of overriding website_type column
     */
    public function getWebsiteTypeNameAttribute()
    {
        return $this->websiteType ? $this->websiteType->type_title : 'N/A';
    }
}
