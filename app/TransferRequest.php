<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferRequest extends Model
{
    
    protected $fillable = [
        'affiliate_id', 'amount', 'status',
    ];

	public function scopeAffiliate($query, $id)
    {
        return $query->where('affiliate_id', $id);
    }
    
    public function scopePending($query)
	{
		return $query->where('status', 'En attente');
	}

	public function scopePaid($query)
	{
		return $query->where('status', 'Payé');
	}

}
