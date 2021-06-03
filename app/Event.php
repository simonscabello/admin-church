<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 */
class Event extends Model
{
    use SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'max_participants',
        'registered_participants'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public function getStartDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function getEndDateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class);
    }
}
