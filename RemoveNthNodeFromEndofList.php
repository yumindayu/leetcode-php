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
  function removeNthFromEnd($head, $n) {
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $p = $dummy;
    $q = $dummy;

    for ($i=0;$i<=$n;$i++) {
      $q = $q->next;
    }
    while($q) {
      $p = $p->next;
      $q = $q->next;
    }
    $p->next = $p->next->next;
    return $dummy->next;
  }
}