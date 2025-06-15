<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lead;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'amount', 'order_id',
        'lead_id', 'payment_id', 'status', 'other'
    ];

    protected $casts = [
        'other' => 'array',
    ];

    /**
     * Get the lead associated with the payment.
     */
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}

