<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static find(int $id)
 */
class Department extends Model
{
    use SoftDeletes;

    protected $table = 'departments';

    protected $fillable = [
        'member_id',
        'name',
        'description'
    ];

    protected $dates = ['deleted_at'];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
