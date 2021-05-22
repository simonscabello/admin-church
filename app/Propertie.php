<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propertie extends Model
{
    protected $table = 'properties';

    protected $fillable = [
        'name',
        'description',
        'amount',
        'value',
        'buy_date',
        'donated',
    ];
}
