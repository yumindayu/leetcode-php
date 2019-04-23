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
   */
  function mergeKLists($lists) {
    $dummyhead = new ListNode(0);
    $current = $dummyhead;
    $pq = new SplMinHeap;
    if (!empty($lists)) {
      foreach ($lists as $l) {
        $pq->insert($l);
      }
    }
    while (!$pq->isEmpty()) {
      $l = $pq->top();
      $pq->next();
      if ($l->next != null) {
        $pq->insert($l->next);
      }
      if ($l) {
        $current->next = $l;
        $current = $current->next;
      }
    }
    return $dummyhead->next;
  }
}
