<?php
/**
 * @author Kudryavtsev Maxim
 * @date 01.05.16
 */

namespace KuMaxim\Test;

use KuMaxim\Implementation\BaseSorter;

abstract class AbstractIntegerTester extends \PHPUnit_Framework_TestCase
{
    private $sorter = null;

    protected function sorterSet(BaseSorter $sortImplementation)
    {
        $this->sorter = $sortImplementation;
    }

    public function numSequenceProvider()
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
     * @dataProvider numSequenceProvider
     */
    public function testSortInASC(array $sequence)
    {
        $sortedSequence = $this->sorter->sort($sequence, 'asc');

        $prev = key($sortedSequence);

        foreach ($sortedSequence as $key => $value) {
            $this->assertGreaterThanOrEqual($sortedSequence[$prev], $value);
            $prev = $key;
        }
    }

    /**
     * @param array $sequence
     * @dataProvider numSequenceProvider
     */
    public function testSortInDESC(array $sequence)
    {
        $sortedSequence = $this->sorter->sort($sequence, 'desc');

        $prev = key($sortedSequence);

        foreach ($sortedSequence as $key => $value) {
            $this->assertLessThanOrEqual($sortedSequence[$prev], $value);
            $prev = $key;
        }
    }
}