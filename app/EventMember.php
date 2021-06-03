<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed member_id
 * @property int|mixed event_id
 */
class EventMember extends Model
{
    protected $table = 'event_member';

    protected $fillable = ['member_id', 'event_id'];
}
