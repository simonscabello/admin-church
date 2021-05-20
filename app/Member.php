<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 */
class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'name',
        'gender',
        'cpf',
        'email',
        'age',
        'telephone',
        'state',
        'city',
        'neighborhood',
        'zip_code',
        'street',
        'number'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
