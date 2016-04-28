<?php
/**
 * @author Kudryavtsev Maxim
 */

namespace KuMaxim\SortingAlgorithm;

use KuMaxim\SortingAlgorithm\Preset\AbstractSet;

/**
 * Interface Algorithm
 * @package KuMaxim\SortingAlgorithm
 */
interface Algorithm
{
    public static function sort(AbstractSet $dataSet);
}