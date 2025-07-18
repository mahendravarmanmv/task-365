<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lead;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'amount', 'order_id', 'lead_id',
        'payment_id', 'status', 'other'
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

    /**
     * Get the user who made the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function getPaymentMetaAttribute()
	{
	$json = $this->other; // Already an array due to $casts

	if (!is_array($json) || !isset($json['original']['data'][0])) {
		return [];
	}

	$data = $json['original']['data'][0];

	$paymentMethod = $data['payment_method'] ?? [];

	return [
		'name' => optional($this->user)->name ?? 'N/A',
		'phone' => $this->extractPhone($paymentMethod) ?? optional($this->user)->phone ?? 'N/A',
		'provider' => $this->extractProvider($paymentMethod),
		'payment_id' => $data['cf_payment_id'] ?? 'N/A',
		'status' => $data['payment_status'] ?? 'N/A',
		'status_msg' => match ($data['payment_status']) {
			'SUCCESS' => 'Payment Success',
			'FAILED' => 'Failed: ' . ($data['error_details']['error_description_raw'] ?? 'Unknown Reason'),
			'PENDING' => 'Pending',
			'USER_DROPPED' => 'User Dropped',
			default => ucfirst(strtolower($data['payment_status'] ?? 'Unknown')),
		},
	];
	}
	private function extractProvider(array $method): string
	{
	if (!empty($method['app']['provider'])) {
		return ucfirst($method['app']['provider']);
	}

	if (!empty($method['netbanking']['netbanking_bank_name'])) {
		return $method['netbanking']['netbanking_bank_name'];
	}

	if (!empty($method['card']['network'])) {
		return ucfirst($method['card']['network']);
	}

	if (!empty($method['upi']['provider'])) {
		return ucfirst($method['upi']['provider']);
	}

	return 'N/A';
	}
	private function extractPhone(array $method): ?string
	{
	if (!empty($method['app']['phone'])) {
		return $method['app']['phone'];
	}

	if (!empty($method['upi']['phone'])) {
		return $method['upi']['phone'];
	}

	// Netbanking and cards typically don't include a phone
	return null;
	}
}
