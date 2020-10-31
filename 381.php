<?php
class RandomizedCollection
{
    private $arr;
    private $len;
    private $indexMap;
    /**
     * Initialize your data structure here.
     */
    public function __construct()
    {
        $this->len = -1;
        $this->arr = [];
    }

    /**
     * Inserts a value to the collection. Returns true if the collection did not already contain the specified element.
     * @param Integer $val
     * @return Boolean
     */
    public function insert($val)
    {
        $this->len++;
        $this->arr[] = $val;
        if (!isset($this->indexMap[$val])) {
            $this->indexMap[$val] = [$this->len];
            return true;
        }
        array_push($this->indexMap[$val], $this->len);
        return false;
    }

    /**
     * Removes a value from the collection. Returns true if the collection contained the specified element.
     * @param Integer $val
     * @return Boolean
     */
    public function remove($val)
    {
        if (isset($this->indexMap[$val])) {
            $index = array_pop($this->indexMap[$val]);
            if (empty($this->indexMap[$val])) {
                unset($this->indexMap[$val]);
            }
            unset($this->arr[$index]);
            return true;
        }
        return false;
    }

    /**
     * Get a random element from the collection.
     * @return Integer
     */
    public function getRandom()
    {
        return $this->arr[array_rand($this->arr)];
    }
}
