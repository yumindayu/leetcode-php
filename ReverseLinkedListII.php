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
   * @param Integer $m
   * @param Integer $n
   * @return ListNode

   输入: 1->2->3->4->5->NULL, m = 2, n = 4
   输出: 1->4->3->2->5->NULL
   */
  function reverseBetween($head, $m, $n) {
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $p = $dummy;
    $cur = $dummy->next;

    for ($i = 1; $i < $m; $i++) {
      $p = $p->next;
      $cur = $cur->next;
    }
    for ($i = 0; $i < $n - $m; $i++) {
      $tmp = $cur->next;
      $cur->next = $tmp->next;
      $tmp->next = $p->next;
      $p->next = $tmp;
    }
    return $dummy->next;
  }
}