<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'welcome_text',
        'banner_title',
        'banner_description',
    ];
}
