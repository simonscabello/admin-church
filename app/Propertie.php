<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static find($id)
 */
class Propertie extends Model
{
    use SoftDeletes;

    protected $table = 'properties';

    protected $fillable = [
        'name',
        'description',
        'amount',
        'value',
        'buy_date',
        'donated',
    ];

    protected $dates = ['deleted_at'];
}
