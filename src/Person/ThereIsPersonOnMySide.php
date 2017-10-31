<?php

namespace App\Person;

use App\Person;

class ThereIsPersonOnMySide extends \Exception
{
    /**
     * @var Person
     */
    protected $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }
}
