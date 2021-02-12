<?php
class KthLargest
{
    public $pq;
    public $n;
    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    public function __construct($k, $nums)
    {
        $this->n  = $k;
        $this->pq = new SplMinHeap();
        foreach ($nums as $num) {
            $this->add($num);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    public function add($val)
    {
        $this->pq->insert($val);
        if ($this->pq->count() > $this->n) {
            $this->pq->extract();
        }
        return $this->pq->top();
    }
}
