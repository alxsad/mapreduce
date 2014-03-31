<?php

$input = ['one', 'two', 'three', 'one', 'two', 'one'];

$mapper = new \MapReduce\Mapper(function ($item) {
    return [$item, 1];
});

$reducer = new \MapReduce\Reducer(function ($values) {
    $result = 0;
    foreach ($values as $value) {
        $result += $value;
    }
});

$mapReduce = new \MapReduce\MapReduce($mapper, $reducer);
$output = $mapReduce->start($input);