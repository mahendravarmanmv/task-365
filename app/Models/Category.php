<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_title',
        'category_description',
        'category_image'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_categories');
    }
    public function leads()
{
    return $this->hasMany(Lead::class);
}
}
