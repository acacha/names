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
     * Get all of the owning nameable models.
     */
    public function nameable()
    {
        return $this->morphTo();
    }
}
