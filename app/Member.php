<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $id)
 * @method static create(array $all)
 * @method static whereHas(string $string, \Closure $param)
 */
class Member extends Model
{
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

    public function tithes(): HasMany
    {
        return $this->hasMany(Tithe::class);
    }

    public function departaments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
