<?php
/**
 * @author Kudryavtsev Maxim
 * @date 01.05.16
 */

namespace KuMaxim\SortingAlgorithm\Preset;

/**
 * Class AbstractSet
 * @package KuMaxim\SortingAlgorithm\Preset
 */
abstract class AbstractSet
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
        $this->collection = $unsorted;
        $this->length = count($unsorted);
    }

    /**
     * @return int|void
     */
    public function getLength()
    {
        return is_int($this->length) ? $this->length : 0;
    }

    /**
     * @return array
     */
    public function getCollection()
    {
        return is_array($this->collection) ? $this->collection : [];
    }

    /**
     * @param $source
     * @param $destination
     *
     * @return mixed
     */
    abstract public function swap($source, $destination);

    /**
     * @param $source
     * @param $destination
     *
     * @return mixed
     */
    abstract public function compare($source, $destination);
}