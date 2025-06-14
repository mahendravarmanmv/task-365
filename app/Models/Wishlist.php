<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'lead_id'];

    // Enable timestamps (default is true, included here for clarity)
    public $timestamps = true;

    /**
     * Get the lead associated with the wishlist.
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    /**
     * Get the user who added the wishlist (optional, if needed).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
