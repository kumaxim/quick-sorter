<?php
/**
 * @author Kudryavtsev Maxim
 * @date 25.04.16
 */

namespace KuMaxim\SortingAlgorithm;

use KuMaxim\SortingAlgorithm\Preset\AbstractSet;

/**
 * Class SelectionSort
 * @package KuMaxim\SortingAlgorithm
 */
class SelectionSort implements Algorithm
{
    /**
     * @param AbstractSet $dataSet
     * @param string $direction
     * @return array
     */
    public static function sort(AbstractSet $dataSet, $direction = 'asc')
    {
        // Simple validation sorting trend
        $direction = ($direction !== 'desc') ? 'asc' : 'desc';

        for ($currentPosition = 0; $currentPosition < $dataSet->getLength(); $currentPosition++) {
            $leadingPosition = $currentPosition;

            for ($desirePosition = $currentPosition + 1; $desirePosition < $dataSet->getLength(); $desirePosition++) {
                $resultCompare = $dataSet->compare($desirePosition, $leadingPosition);
                $trend = ($direction === 'asc') ? $resultCompare : !$resultCompare;

                $leadingPosition = ($trend) ? $desirePosition : $leadingPosition;
            }

            if ($leadingPosition !== $currentPosition) {
                $dataSet->swap($currentPosition, $leadingPosition);
            }
        }

        return $dataSet->getCollection();
    }


}