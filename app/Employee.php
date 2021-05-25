<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class Employee extends Model
{
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
}
