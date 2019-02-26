<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $fillable = ['question', 'answer', 'category', 'tag'];
}
