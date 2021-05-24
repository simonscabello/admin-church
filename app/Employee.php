<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
