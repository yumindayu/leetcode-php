<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode

     输入: 1->2->3->4->5->NULL, k = 2
      head->  1
            5   2
             4 3
      
      head->  5
            4   1
             3 2

      head->  4
            3   5
             2 1
     输出: 4->5->1->2->3->NULL
     */
    function rotateRight($head, $k) {
      $p = $head;
      $length = 1;
      while ($p->next != null) {
        $p = $p->next;
        $length++;
      }
      $p->next = $head;
      for ($i = 1; $i < $length - ($k % $length); $i++) {
        $head = $head->next;
      }
      $res = $head->next;
      $head->next = null;
      return $res;
    }
}