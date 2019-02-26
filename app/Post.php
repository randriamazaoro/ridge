<?php

namespace App;

use App\Scopes\OrderScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'subject', 'category_id', 'content', 'user_id', 'slug',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope(new OrderScope);
    }
}
