<?php

namespace Acacha\Names\Traits;

use Acacha\Names\Exceptions\ModelHaveNoKey;
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
        $this->setAttributeByName(['shortname' => $value]);
    }

    /**
     * Set the fullname.
     *
     * @param  string  $value
     * @return void
     */
    public function setFullnameAttribute($value)
    {
        $this->setAttributeByName(['fullname' => $value]);
    }

    /**
     * Set the nickname.
     *
     * @param  string  $value
     * @return void
     */
    public function setNicknameAttribute($value)
    {
        $this->setAttributeByName(['nickname' => $value]);
    }

    /**
     * Set the code.
     *
     * @param  string  $value
     * @return void
     */
    public function setCodenameAttribute($value)
    {
        $this->setAttributeByName(['code' => $value]);
    }

    /**
     * Set the description.
     *
     * @param  string  $value
     * @return void
     */
    public function setDescriptionAttribute($value)
    {
        $this->setAttributeByName(['description' => $value]);
    }

    /**
     * Set the notes.
     *
     * @param  string  $value
     * @return void
     */
    public function setNotesAttribute($value)
    {
        $this->setAttributeByName(['notes' => $value]);
    }

    /**
     * Set the notes.
     *
     * @param  array $names
     * @return void
     */
    public function setAltnamesAttribute($names)
    {
        $this->setAttributeByName($names);
    }

    /**
     * Set attribute by name.
     *
     * @param $values
     * @param array|string $attributes
     * @throws \Exception
     */
    protected function setAttributeByName($attributes)
    {
        if ($this->getKey() == null) throw new ModelHaveNoKey();

        $name = Name::firstOrCreate([
            'nameable_id' => $this->getKey(),
            'nameable_type' => get_class($this)
        ]);
        foreach ($attributes as $attribute => $value) {
            $name->{$attribute} = $value;
        }
        $name->save();
        $this->names()->save($name);
    }

    /**
     * Get the shortname.
     *
     * @param  string  $value
     * @return string
     */
    public function getShortnameAttribute($value)
    {
        return $this->getAttributeByName('shortname');
    }

    /**
     * Get the fullname.
     *
     * @param  string  $value
     * @return string
     */
    public function getFullnameAttribute($value)
    {
        return $this->getAttributeByName('fullname');
    }

    /**
     * Get the nickname.
     *
     * @param  string  $value
     * @return string
     */
    public function getNicknameAttribute($value)
    {
        return $this->getAttributeByName('nickname');
    }

    /**
     * Get the code.
     *
     * @param  string  $value
     * @return string
     */
    public function getCodeAttribute($value)
    {
        return $this->getAttributeByName('code');
    }

    /**
     * Get the description.
     *
     * @param  string  $value
     * @return string
     */
    public function getDescriptionAttribute($value)
    {
        return $this->getAttributeByName('description');
    }

    /**
     * Get the notes.
     *
     * @param  string  $value
     * @return string
     */
    public function getNotesAttribute($value)
    {
        return $this->getAttributeByName('notes');
    }

    /**
     * Get the alternative names.
     *
     * @param  array $names
     * @return array
     */
    public function getAltnamesAttribute($names)
    {
        if ($this->names()->count() > 0) {
            list($shortname, $fullname, $nickname, $code, $description, $notes) = array_fill(0, 6, null);
            extract($this->names()->first()->toArray(), EXTR_IF_EXISTS);
            return compact('shortname','fullname','nickname','code','description','notes');
        }
        return '';
    }

    /**
     * @param $attribute
     * @return string
     */
    private function getAttributeByName($attribute)
    {
        return ($this->names()->count() > 0) ? $this->names()->first()->{$attribute} : '';
    }
}