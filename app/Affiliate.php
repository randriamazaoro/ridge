<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{

    protected $fillable = [
        'id', 'program', 'gains_per_email', 'gains_per_sale', 'gains_per_email_limit',
    ];

    public function sales()
    {
    	return $this->hasMany('App\Sale');
    }

    public function emails()
    {
    	return $this->hasMany('App\Email');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
