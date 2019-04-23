<?php
/**
 * Definition for an interval.
 * class Interval {
 *     public $start = 0;
 *     public $end = 0;
 *     function __construct(int $start = 0, int $end = 0) {
 *         $this->start = $start;
 *         $this->end = $end;
 *     }
 * }

 输入: [[1,3],[2,6],[8,10],[15,18]]
 输出: [[1,6],[8,10],[15,18]]
 解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].


 [[1,4],[0,4]]
 */

class Solution {

  /**
   * @param Interval[] $intervals
   * @return Interval[]
   */
  function merge($intervals) {
    $ret = [];
    if (empty($intervals)) return $ret;
    $intervals = $this->array_sort($intervals);
    $start = $intervals[0]->start;
    $end = $intervals[0]->end;
    array_shift($intervals);
    foreach ($intervals as $interval) {
      if ($interval->start <= $end) {
        $end = max($end, $interval->end);
      } else {
        array_push($ret, new Interval($start, $end));
        $start = $interval->start;
        $end = $interval->end;
      }
    }
    array_push($ret, new Interval($start, $end));
    return $ret;
  }

  function array_sort($intervals) {
    $startArray = [];
    foreach ($intervals as $interval) {
      $startArray[] = $interval->start;
    }
    array_multisort($startArray, SORT_ASC, $intervals);
    return $intervals;
  }
}
