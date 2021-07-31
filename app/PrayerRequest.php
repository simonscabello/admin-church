<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static orderBy(string $string)
 * @method static create(array $all)
 * @method static find(int $id)
 */
class PrayerRequest extends Model
{
    use SoftDeletes;

    protected $table = 'prayer_requests';

    protected $fillable = [
        'member_id',
        'date',
        'description'
    ];

    protected $dates = ['deleted_at'];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
