<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use SoftDeletes;

    protected $table = 'reports';

    protected $fillable = ['name', 'month', 'entries', 'exits', 'balance', 'previus_balance', 'next_balance', 'file_id'];

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public static function path(): string
    {
        return '/reports';
    }
}
