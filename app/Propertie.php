<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static find($id)
 */
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
