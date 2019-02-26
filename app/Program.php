<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name', 'price', 'formation', 'remuneration', 'social', 'advantages', 'gains_per_sale', 'gains_per_email',
    ];
}
