<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 */
class Tithe extends Model
{
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

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
