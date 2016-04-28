<?php
/**
 * @author Kudryavtsev Maxim
 * @date 30.04.16
 */

namespace KuMaxim\SortingAlgorithm\Preset;

/**
 * Class IntegerSet
 * @package KuMaxim\SortingAlgorithm\Preset
 */
class IntegerSet extends AbstractSet
{
    /**
     * @param array $unsorted
     */
    public function __construct(array $unsorted)
    {
        parent::__construct($unsorted);
        $this->collection = $this->sanitize($this->collection);
        $this->length = count($this->collection);
    }

    /**
     * @param array $unsafe
     * @return array
     */
    private function sanitize(array $unsafe)
    {
        return array_filter($unsafe, 'is_int');
    }

    /**
     * @param integer $source
     * @param integer $destination
     *
     * @return void
     */
    public function swap($source, $destination)
    {
        $this->collection[$source] = $this->collection[$source] ^ $this->collection[$destination];
        $this->collection[$destination] = $this->collection[$source] ^ $this->collection[$destination];
        $this->collection[$source] = $this->collection[$source] ^ $this->collection[$destination];

        return;
    }

    /**
     * @param integer $source
     * @param integer $destination
     *
     * @return bool
     */
    public function compare($source, $destination)
    {
        if (($source < 0) || ($destination < 0)) {
            throw new \RuntimeException(
                'One of index less then zero. It is value: ' .
                sprintf('source => %s; destination => %s', $source, $destination)
            );
        }

        if ($this->collection[$source] <= $this->collection[$destination]) {
            return true;
        }

        return false;
    }
}