<?php

namespace Tests;

use App\Chief;
use App\Leaf;
use App\Pen;
use App\Person;
use PHPUnit\Framework\TestCase;

class WritePersonNamesTest extends TestCase
{
    public function testChiefAskPersonToWriteNameAndForward()
    {
        $pen = new Pen();
        $leaf = new Leaf($pen);
        $chief = new Chief($leaf);

        $john = new Person('John');
        $emma = new Person('Emma');
        $steve = new Person('Steve');
        $kate = new Person('Kate');
        $john->setSide($emma);
        $emma->setSide($steve);
        $steve->setSide($kate);

        $leaf->watch(function () use ($pen, $chief, $john) {
            $pen->watch(function () use ($chief, $john) {
                $chief->askPersonToWriteNameAndForward($john);
            });
        });



        $this->assertCount(4, $leaf->getLines());
        $this->assertContains('John', $leaf->getLines());
        $this->assertContains('Emma', $leaf->getLines());
        $this->assertContains('Steve', $leaf->getLines());
        $this->assertContains('Kate', $leaf->getLines());

    }
}
