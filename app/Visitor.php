<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 */
class Visitor extends Model
{
    use SoftDeletes;

    protected $table = 'visitors';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'visit_day'
    ];
}
