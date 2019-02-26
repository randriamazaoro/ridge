<?php

namespace App;

use App\Scopes\OrderScope;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

	protected $fillable = [
        'affiliate_id', 'product', 'status', 'tag', 'referral_value', 'real_value', 'benefits', 'gains_per_email_limit', 'requested',
    ];

    public function affiliate()
    {
    	return $this->belongsTo('App\Affiliate');
    }

	protected static function boot()
	{
		parent::boot();
		
		static::addGlobalScope(new OrderScope);
	}

	public function scopeAffiliate($query, $id)
    {
        return $query->where('affiliate_id', $id);
    }

	public function scopePending($query)
	{
		return $query->where('status', 'En attente')->get();
	}

	public function scopeApprouved($query)
	{
		return $query->where('status', 'Approuvé')->get();
	}

	public function scopePaid($query)
	{
		return $query->where('status', 'Payé')->get();
	}
	
}
