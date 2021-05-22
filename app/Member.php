<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'phone',
        'address',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function tithes(): HasMany
    {
        return $this->hasMany(Tithe::class);
    }
}
