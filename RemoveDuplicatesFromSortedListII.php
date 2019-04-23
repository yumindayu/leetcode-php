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
   * @return ListNode

   输入: 1->2->3->3->3->4->4->5
   输出: 1->2->5

   */
  function deleteDuplicates($head) {
    if (!$head) return null;
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $p = $dummy;
    while ($p->next && $p->next->next) {
      if ($p->next->val == $p->next->next->val) {
        $num = $p->next->val;
        while ($p->next && $p->next->val == $num) {
          $p->next = $p->next->next;
        }
      } else {
        $p = $p->next;
      }
    }
    return $dummy->next;
  }
}