<?php

namespace Acacha\Names;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Name.
 *
 * @package Acacha\Names
 */
class Name extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['shortname','fullname','nickname','code','description','notes','nameable_id','nameable_type'];

    /**
     * Get all of the owning nameable models.
     */
    public function nameable()
    {
        return $this->morphTo();
    }
}
