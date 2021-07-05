<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 */
class Church extends Model
{
    use SoftDeletes;

    protected $table = 'churches';

    protected $fillable = [
        'name',
        'description',
        'address',
        'type',
        'leader',
        'cnpj',
        'phone',
        'members'
    ];

    protected $dates = ['deleted_at'];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}
