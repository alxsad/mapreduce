<?php

namespace MapReduce;

interface ReducerInterface
{
    public function reduce ($item);
}