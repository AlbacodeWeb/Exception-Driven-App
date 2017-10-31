<?php

namespace App;

use App\Person\ThereIsNobodyOnMySide;
use App\Person\ThereIsPersonOnMySide;
use App\Person\WriteMyNameWithPen;

class Person
{

    protected $name;

    protected $side;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setSide(Person $person)
    {
        $this->side = $person;
    }

    public function writeNameAndForward()
    {
        $exception = true;
        while ($exception) {
            try {
                $this->isTherePersonOnMySide();
            } catch (ThereIsNobodyOnMySide $e) {
                throw new WriteMyNameWithPen($this->name);
            }
        }
    }

    public function isTherePersonOnMySide()
    {
        if (!empty($this->side)) {
            throw new ThereIsPersonOnMySide($this->side);
        }
        throw new ThereIsNobodyOnMySide();
    }
}