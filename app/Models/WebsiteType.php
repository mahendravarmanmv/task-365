<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteType extends Model
{
    protected $fillable = ['category_id', 'type_title'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

