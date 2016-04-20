<?php

class QuickSorter
{
	/**
	 * Left border
	 * @var int
	 */
	private $left;

	/**
	 * Right border
	 * @var int
	 */
	private $right;

	/**
	 * Pivot value
	 * @var int
	 */
	private $pivot;

	/**
	 * Collection for sorting
	 * @var array
	 */
	private $collection;

	private $length;

	/**
	 * @param array $unsorted Unsorted collection
	 */
	public function __construct(array $unsorted) {
		if (count($unsorted) >= 1) {
			$this->collection = $unsorted;
			$this->length = count($unsorted);
			$this->left   = 0;
			$this->right  = count( $unsorted ) - 1;
			$this->pivot  = $this->pickupPivotValue();
		}

		dump($this);
	}

	public function sort()
	{
		if (($this->right - $this->left) <= 1) {
			return $this->collection;
		}

		do
		{
			while ($this->collection[$this->left] <= $this->pivot) {
				$this->left++;
			}

			while ($this->collection[$this->right] > $this->pivot) {
				$this->right--;
			}

			if ($this->left < $this->right) {
				$this->swap( $this->left, $this->right );
				$this->left++;
				$this->right--;
			}
		} while ($this->left < $this->right);

		$leftSide = ( ($this->length - $this->left) > 1 ) ? array_slice( $this->collection, 0, $this->left + 1 ) : [];

		if (!empty($leftSide)) {
			$sortLeft = new self( $leftSide );
			$leftSide = $sortLeft->sort();
		}

		$rightSide = ($this->left - $this->length < -1) ? array_slice( $this->collection, $this->left + 1 ) : [];

		if (!empty($rightSide)) {
			$sortRight = new self( $rightSide );
			$rightSide = $sortRight->sort();
		}

		$this->collection = array_merge($leftSide, $rightSide);

		return $this->collection;
	}

	/**
	 * Swap value inside collection
	 * @param $source
	 * @param $destination
	 */
	private function swap($source, $destination)
	{
		if (!is_int($this->collection[$source]) || !is_int($this->collection[$destination])) {
			throw new RuntimeException('You can exchange only number');
		}

		$this->collection[$source] = $this->collection[$source] ^ $this->collection[$destination];
		$this->collection[$destination] = $this->collection[$source] ^ $this->collection[$destination];
		$this->collection[$source] = $this->collection[$source] ^ $this->collection[$destination];

		return;
	}

	private function pickupPivotValue()
	{
		$avg = 0;

		foreach ($this->collection as $value) {
			$avg += $value;
		}

		$avg /= count($this->collection);
		return intval($avg);
	}
}