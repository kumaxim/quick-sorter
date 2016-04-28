<?php

/**
 * @author Kudryavtsev Maxim
 * @date 25.04.16
 */

namespace KuMaxim\Example\SelectionSort;

use KuMaxim\SortingAlgorithm\SelectionSort;

class IntegerSorter extends SelectionSort
{
    /**
     * @param mixed $item
     * @return mixed
     */
    protected function healthyItem($item)
    {
        return is_int($item);
    }

    /**
     * @param mixed $source
     * @param mixed $destination
     *
     * @return bool
     */
    protected function compare($source, $destination, $direction = 'asc')
    {
        if (($source < 0) || ($destination < 0)) {
            throw new \RuntimeException(
                'One of index less then zero. It is value: ' .
                sprintf('source => %s; destination => %s', $source, $destination)
            );
        }

        $result = false;

        if ($this->collection[$source] <= $this->collection[$destination]) {
            $result = true;
        }

        return ($direction === 'asc') ? $result : !$result;
    }

    /**
     * @param int $source
     * @param int $destination
     *
     * @return void
     */
    protected function swap($source, $destination)
    {
        $this->collection[$source] = $this->collection[$source] ^ $this->collection[$destination];
        $this->collection[$destination] = $this->collection[$source] ^ $this->collection[$destination];
        $this->collection[$source] = $this->collection[$source] ^ $this->collection[$destination];

        return;
    }
}