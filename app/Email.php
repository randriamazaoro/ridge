<?php

namespace App;

use App\Scopes\OrderScope;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function affiliate()
    {
    	return $this->belongsTo('App\affiliate');
    }

    protected $fillable = [
        'affiliate_id', 'email', 'referral_value', 'status', 'tag', 'requested',
    ];

    protected static function boot()
	{
		parent::boot();
		
		static::addGlobalScope(new OrderScope);
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

    public function scopeAffiliate($query, $id)
    {
        return $query->where('affiliate_id', $id);
    }
    
}
