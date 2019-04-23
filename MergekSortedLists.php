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
   * @param ListNode[] $lists
   * @return ListNode


   [
      1->4->5,
      1->3->4,
      2->6
   ]
   输出: 1->1->2->3->4->4->5->6

   */
  function mergeKLists($lists) {
    return $this->handle($lists, 0, count($lists) - 1);
  }

  function handle($list, $left, $right) {
    if ($left >= $right) return $lists[$left];

    $mid = floor(($right - $left) / 2) + $left;
    $l1 = $this->handle($lists, $left, $mid);
    $l2 = $this->handel($lists, $mid + 1, $right);
    return $this->merge($l1, $l2);
  }

  function merge($l1, $l2) {
    if (!$l1) return $l2;
    if (!$l2) return $l1;

    $dummyhead = new ListNode(0);
    $current = $dummyhead;
    while ($l1 || $l2) {
      if (!$l1) {
        $current->next = $l2;
        break;
      }
      if (!$l2) {
        $current->next = $l1;
        break;
      }

      if ($l1->val < $l2->val) {
        $current->next = $l1;
        $current = $current->next;
        $l1 = $l1->next;
      } else {
        $current->next = $l2;
        $current = $current->next;
        $l2 = $l2->next;
      }
    }
    return $dummyhead->next;
  }
}
