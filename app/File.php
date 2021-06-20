<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed name
 * @property mixed original_name
 * @property mixed mime_type
 * @property mixed|string url
 * @property mixed|string path
 * @property mixed size
 * @property mixed id
 */
class File extends Model
{
    use SoftDeletes;

    protected $table = 'files';

    protected $fillable = [
        'name', 'original_name', 'mime_type', 'url', 'path', 'size',
    ];

    /**
     * @return string
     */
    public static function path(): string
    {
        return '/file';
    }
}
