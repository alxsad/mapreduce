<?php

namespace MapReduce;

class MapReduce
{
    protected $mapper;
    protected $reducer;

    public function __construct (MapperInterface $mapper, ReducerInterface $reducer)
    {
        $this->mapper  = $mapper;
        $this->reducer = $reducer;
    }

    public function start (\Traversable $collection)
    {
        $mapped = [];
        foreach ($collection as $item) {
            if ($result = $this->mapper->map($item)) {
                $mapped[$result[0]] = $result[1];
            }
        }
        $reduced = [];
        foreach ($mapped as $key => $values) {
            $reduced[$key] = $this->reducer->reduce($values);
        }
        return $reduced;
    }
}