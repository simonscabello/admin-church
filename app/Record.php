<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $id)
 * @property mixed name
 * @property mixed date
 * @property mixed file_id
 */
class Record extends Model
{
    use SoftDeletes;

    protected $table = 'records';

    protected $fillable = ['name', 'date', 'number', 'file_id'];

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public static function path(): string
    {
        return '/records';
    }
}
