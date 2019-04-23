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

   输入: 1->1->2
   输出: 1->2
   */
  function deleteDuplicates($head) {
    if (!$head) return null;
    $cur = $head;
    while ($cur->next) {
      if ($cur->next->val == $cur->val) {
        $cur->next = $cur->next->next;
      } else {
        $cur = $cur->next;
      }
    }
    return $head;
  }
}