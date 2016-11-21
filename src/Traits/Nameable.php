<?php

namespace Acacha\Names\Traits;

use Acacha\Names\Name;

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

    /**
     * Set the shortname.
     *
     * @param  string  $value
     * @return void
     */
    public function setShortnameAttribute($value)
    {
        if ($this->getKey() == null) throw new \Exception();
        $name = Name::firstOrCreate([
            'nameable_id'   => $this->getKey(),
            'nameable_type' => get_class($this)
        ]);
        $name->shortname = $value;
        $name->save();
        $this->names()->save($name) ;
    }
}