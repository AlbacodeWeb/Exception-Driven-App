<?php

namespace App;

use App\Leaf\LineWrittenOnLeaf;
use App\Pen\WriteLineOnLeaf;

class Leaf
{

    use EventTrait;

    protected $pen;

    protected $lines = [];

    public function __construct(Pen $pen)
    {
        $this->pen = $pen;
    }

    public function onWriteLineOnLeaf(WriteLineOnLeaf $e)
    {
        $this->lines[] = $e->getWrittenLine();
        throw new LineWrittenOnLeaf();
    }
}
