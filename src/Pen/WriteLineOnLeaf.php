<?php

namespace App\Pen;

class WriteLineOnLeaf extends \Exception
{

    protected $writtenLine;

    public function __construct($writtenLine)
    {
        $this->writtenLine = $writtenLine;
    }

    public function getWrittenLine()
    {
        return $this->writtenLine;
    }
}