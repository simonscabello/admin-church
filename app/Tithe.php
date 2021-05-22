<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $all)
 */
class Tithe extends Model
{
    protected $table = 'tithes';

    protected $fillable = [
        'member_id',
        'date',
        'type',
        'value'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
