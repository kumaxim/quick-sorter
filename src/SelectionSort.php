<?php
/**
 * @author Kudryavtsev Maxim
 * @date 25.04.16
 */

namespace KuMaxim\SortingAlgorithm;

/**
 * Class SelectionSort
 * @package KuMaxim\SortingAlgorithm
 */
abstract class SelectionSort implements Algorithm
{
    /**
     * @var array
     */
    protected $collection = [];

    /**
     * @var int
     */
    protected $length;

    /**
     * @param array $unsorted
     */
    public function __construct(array $unsorted)
    {
        $this->collection = $this->sanitize($unsorted);
        $this->length = count($this->collection);
    }

    /**
     * @param string $direction
     * @return array
     */
    public function sort($direction = 'asc')
    {
        $direction = ($direction !== 'desc') ? 'asc' : 'desc';

        for ($currentPosition = 0; $currentPosition < $this->length; $currentPosition++) {
            $leadingPosition = $currentPosition;

            for ($desirePosition = $currentPosition + 1; $desirePosition < $this->length; $desirePosition++) {
                if ($this->compare($desirePosition, $leadingPosition, $direction)) {
                    $leadingPosition = $desirePosition;
                }
            }

            if ($leadingPosition !== $currentPosition) {
                $this->swap($currentPosition, $leadingPosition);
            }
        }

        return $this->collection;
    }

    /**
     * @param array $unsafe
     * @throws \Exception
     * @return array
     */
    private function sanitize(array $unsafe)
    {
        return array_filter($unsafe, [$this, 'healthyItem']);
    }

    /**
     * @param mixed $item
     * @return mixed
     */
    abstract protected function healthyItem($item);

    /**
     * @param int $source
     * @param int $destination
     *
     * @return void
     */
    abstract protected function swap($source, $destination);

    /**
     * @param mixed $source
     * @param mixed $destination
     *
     * @return bool
     */
    abstract protected function compare($source, $destination, $direction);
}