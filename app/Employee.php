<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 */
class Employee extends Model
{
    use SoftDeletes;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'address',
        'cpf',
        'occupation',
        'description',
        'phone',
        'email',
        'started_in',
        'salary',
    ];

    protected $dates = ['deleted_at'];
}
