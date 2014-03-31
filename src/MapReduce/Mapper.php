<?php

namespace MapReduce;

class Mapper implements MapperInterface
{
    protected $fn;

    public function __construct (\Closure $fn)
    {
        $this->fn = $fn;
    }

    public function map ($item)
    {
        return $this->fn($item);
    }
}