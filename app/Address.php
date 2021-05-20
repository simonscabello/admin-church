<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $all)
 */
class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = ['state', 'city', 'neighborhood', 'zip_code', 'street', 'number', 'member_id'];

    public function member(): HasOne
    {
        return $this->hasOne(Member::class);
    }
}
