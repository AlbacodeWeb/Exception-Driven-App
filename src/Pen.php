<?php

namespace App;

use App\Leaf\LineWrittenOnLeaf;
use App\Pen\WriteLineOnLeaf;
use App\Person\WriteMyNameWithPen;

class Pen
{
    use EventTrait;

    public function onWriteMyNameWithPen(WriteMyNameWithPen $e)
    {
        $name = $e->getName();
        throw new WriteLineOnLeaf($name);
    }

    public function onLineWrittenOnLeaf(LineWrittenOnLeaf $e)
    {

    }
}