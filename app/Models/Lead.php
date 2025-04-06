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
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

