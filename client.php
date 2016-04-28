<?php
/**
 * @author apach47
 */

require_once __DIR__ . '/vendor/autoload.php';

define('NUMBER_OF_ELEMENT', 10);
define('RANDOM_BORDER', 25);

function fill($i = 0) {
    if ($i < (NUMBER_OF_ELEMENT - 1)) {
        return array_merge(fill(++$i), [rand(1, RANDOM_BORDER)]);
    }

    return [rand(1, RANDOM_BORDER)];
}

$collection = [
    0 => 6,
    1 => 21,
    2 => 7,
    3 => 13,
    4 => 17,
    5 => 20,
    6 => 1,
    7 => 4,
    8 => 18,
    9 => 9,
];
//$source = fill();
dump($collection);

$sorter = new \KuMaxim\Implementation\IntegerSelectionSorter($collection);
$sorted = $sorter->sort();

dump($sorted);