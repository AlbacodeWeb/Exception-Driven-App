<?php

namespace App;


trait EventTrait
{

    public function watch(\Closure $closure)
    {
        while (true) {
            try {
                $closure->call($this);
            } catch (\Exception $e) {
                $method = 'on' . (new \ReflectionClass($e))->getShortName();
                $localReflexion = new \ReflectionClass($this);
                if ($localReflexion->hasMethod($method )) {
                    call_user_func_array(array($this, $method), array($e));
                } else {
                    throw $e;
                }
            }
        }
    }
}