<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedTheme extends Model
{
    public function theme()
    {
    	return $this->belongsTo('App\Theme');
    }

    protected $fillable = [
        'affiliate_id', 'theme_id',
    ];

    public function scopeAffiliate($query, $id)
    {
        return $query->where('affiliate_id', $id);
    }
}
