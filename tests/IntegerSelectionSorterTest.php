<?php
/**
 * @author Kudryavtsev Maxim
 * @date 25.04.16
 */

namespace KuMaxim\Test\SelectionSort;


use KuMaxim\Implementation\IntegerSelectionSorter;
use KuMaxim\Test\AbstractIntegerTester;

class IntegerSelectionSorterTest extends AbstractIntegerTester
{
    /**
     *
     */
    protected function setUp()
    {
        $this->sorterSet(new IntegerSelectionSorter());
    }

}