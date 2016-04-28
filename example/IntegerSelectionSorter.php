<?php

/**
 * @author Kudryavtsev Maxim
 * @date 01.05.16
 */

namespace KuMaxim\Implementation;

use KuMaxim\SortingAlgorithm\Preset\IntegerSet;
use KuMaxim\SortingAlgorithm\SelectionSort;

class IntegerSelectionSorter implements BaseSorter
{
    public function sort(array $sequence, $direction)
    {
        try {
            $numberSequence = new IntegerSet($sequence);
            return SelectionSort::sort($numberSequence, $direction);
        } catch (\Exception $err) {
            throw $err;
        }
    }
}