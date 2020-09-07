<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    public function topKFrequent($nums, $k)
    {
        $record = array_count_values($nums);
        $pq     = new PQ;
        $i      = 0;
        foreach ($record as $key => $value) {
            if ($i >= $k) {
                break;
            }
            $pq->insert($key, $value);
            $i++;
            unset($record[$key]);
        }
        $pq->setExtractFlags(PQ::EXTR_BOTH);
        if (!empty($record)) {
            foreach ($record as $key => $value) {
                $top = $pq->top();
                if ($value > $top['priority']) {
                    $pq->extract();
                    $pq->insert($key, $value);
                }
            }
        }
        $res = [];
        while ($pq->valid()) {
            array_unshift($res, $pq->current()['data']);
            $pq->next();
        }
        return $res;
    }
}

class PQ extends \SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) {
            return 0;
        }

        return $priority1 < $priority2 ? 1 : -1;
    }
}
