<?php
class Solution
{
    public $nums = [];

    public $source = [];
    /**
     * @param Integer[] $nums
     */
    public function __construct($nums)
    {
        $this->nums   = $nums;
        $this->source = $nums;
    }

    /**
     * Resets the array to its original configuration and return it.
     * @return Integer[]
     */
    public function reset()
    {
        return $this->source;
    }

    /**
     * Returns a random shuffling of the array.
     * @return Integer[]
     */
    public function shuffle()
    {
        for ($i = 0; $i < count($this->nums); $i++) {
            $this->swap($i, rand($i, count($this->nums) - 1));
        }
        return $this->nums;
    }

    public function swap($i, $j)
    {
        $temp           = $this->nums[$i];
        $this->nums[$i] = $this->nums[$j];
        $this->nums[$j] = $temp;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($nums);
 * $ret_1 = $obj->reset();
 * $ret_2 = $obj->shuffle();
 */
