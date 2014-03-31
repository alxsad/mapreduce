<?php

namespace MapReduce;

class Reducer implements ReducerInterface
{
    protected $fn;

    public function __construct(\Closure $fn)
    {
        $this->fn = $fn;
    }

    public function reduce ($item)
    {
        return $this->fn($item);
    }
}