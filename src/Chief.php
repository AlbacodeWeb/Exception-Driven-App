<?php

namespace App;

use App\Chief\LastPersonWritten;
use App\Leaf\LineWrittenOnLeaf;
use App\Person\ThereIsNobodyOnMySide;
use App\Person\ThereIsPersonOnMySide;

class Chief
{

    use EventTrait;

    protected $leaf;

    protected $pen;

    public function __construct(Leaf $leaf)
    {
        $this->leaf = $leaf;
    }

    public function askPersonToWriteNameAndForward(Person $person)
     {
         while(true) {
             try {
                 $person->writeNameAndForward();
             } catch (ThereIsPersonOnMySide $e) {
                 $this->forwardPersonToWriteNameAndForward($e->getPerson());
             } catch (LineWrittenOnLeaf $e) {
                 throw new LastPersonWritten();
             }
         }
     }

    public function forwardPersonToWriteNameAndForward(Person $person)
    {
        $this->watch(function() use ($person) {
            $person->writeNameAndForward();
        });
    }

     public function onThereIsPersonOnMySide(ThereIsPersonOnMySide $e)
     {
         $this->forwardPersonToWriteNameAndForward($e->getPerson());
     }

     public function onLastPersonWritten(LastPersonWritten $e)
     {

     }

     public function onLineWrittenOnLeaf(LineWrittenOnLeaf $e)
     {

     }
}