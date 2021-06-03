<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 */
class Tithe extends Model
{
    Use SoftDeletes;

    protected $table = 'tithes';

    protected $fillable = [
        'member_id',
        'date',
        'type',
        'value'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
