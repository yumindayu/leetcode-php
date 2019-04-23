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

 输入: intervals = [[1,2],[3,5],[6,7],[8,10],[12,16],[17,18]], newInterval = [4,8]
 输出: [[1,2],[3,10],[12,16]]
 */
class Solution {

    /**
     * @param Interval[] $intervals
     * @param Interval $newInterval
     * @return Interval[]
     */
    function insert($intervals, $newInterval) {
      $ret = [];
      $start = $newInterval->start;
      $end = $newInterval->end;
      foreach ($intervals as $interval) {
        if ($interval->start > $end) {
          array_push($ret, new Interval($start, $end));
          $start = $interval->start;
          $end = $interval->end;
        }

        if ($interval->start > $end || $interval->end < $start) {
          array_push($ret, $interval);
        } else {
          $start = min($start, $interval->start);
          $end = max($end, $interval->end);
        }
      }
      array_push($ret, new Interval($start, $end));
      return $ret;
    }
}















