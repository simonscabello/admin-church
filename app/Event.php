<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'max_participants',
    ];
}
