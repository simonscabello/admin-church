<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * @method static find(int $id)
 * @method static create(array $all)
 * @method static whereHas(string $string, \Closure $param)
 * @method static where(string $string, mixed $birth_day)
 * @method static orderBy(string $string)
 */
class Member extends Authenticatable
{
    use SoftDeletes, HasApiTokens, Notifiable;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'gender_id',
        'cpf',
        'relationship_status_id',
        'rg',
        'email',
        'birth_day',
        'birth_place',
        'conversion_date',
        'baptism_day',
        'father_name',
        'mother_name',
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

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function relationshipStatus(): BelongsTo
    {
        return $this->belongsTo(RelationshipStatus::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
}
