<?php


/**
 * Class Nameable.
 */
trait Nameable
{
    /**
     * Get all of the alternative model names.
     */
    public function names()
    {
        return $this->morphMany(Name::class, 'nameable');
    }
}