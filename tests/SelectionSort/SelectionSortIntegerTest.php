<?php
/**
 * @author Kudryavtsev Maxim
 * @date 25.04.16
 */

namespace KuMaxim\Test\SelectionSort;

use KuMaxim\Example\SelectionSort\IntegerSorter;

class SelectionSortIntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function sequenceProvider()
    {
        return [
            [[6, 21, 7, 13, 17, 20, 1, 4, 18, 9,]],
            [[9]],
            [[]],
            [[null, false, 'any-text']],
            [[true, 2]]
        ];
    }

    /**
     * @param array $sequence
     * @dataProvider sequenceProvider
     */
    public function testSortInASC(array $sequence)
    {
        $sorter = new IntegerSorter($sequence);
        $sortedSequence = $sorter->sort();

        $prev = key($sortedSequence);

        foreach ($sortedSequence as $key => $value) {
            $this->assertGreaterThanOrEqual($sortedSequence[$prev], $value);
            $prev = $key;
        }
    }

    /**
     * @param array $sequence
     * @dataProvider sequenceProvider
     */
    public function testSortInDESC(array $sequence)
    {
        $sorter = new IntegerSorter($sequence);
        $sortedSequence = $sorter->sort('desc');

        $prev = key($sortedSequence);

        foreach ($sortedSequence as $key => $value) {
            $this->assertLessThanOrEqual($sortedSequence[$prev], $value);
            $prev = $key;
        }
    }
}