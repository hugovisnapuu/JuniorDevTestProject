<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(\Illuminate\Support\HigherOrderTapProxy $data)
 */
class Company extends Model
{
    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
