<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'title', 'url', 'description',
    ];

    public function owned_theme()
    {
    	return $this->hasOne('App\OwnedTheme');
    }
}
