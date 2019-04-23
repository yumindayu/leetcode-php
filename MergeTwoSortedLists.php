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
   * @param ListNode $l1
   * @param ListNode $l2
   * @return ListNode

   输入：
   1->2->4,
   1->3->4

   输出：1->1->2->3->4->4
   */
  function mergeTwoLists($l1, $l2) {
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