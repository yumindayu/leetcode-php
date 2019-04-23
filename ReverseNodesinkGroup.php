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
   k个一组翻转链表
   给定这个链表：1->2->3->4->5

    当 k = 2 时，应当返回: 2->1->4->3->5

    当 k = 3 时，应当返回: 3->2->1->4->5

   */
  function reverseKGroup($head, $k) {
    $node = $head;
    for ($i = 0; $i < $k; $i++) {
      if (!$node) return $head;
      $node = $node->next;
    }
    $new_head = $this->reverse($head, $node);
    $head->next = $this->reverseKGroup($node, $k);
    return $new_head;
  }

  function reverse($start, $end) {
    $pre = null;

    while ($start != $end) {
      $temp = $start->next;
      $start->next = $pre;
      $pre = $start;
      $start = $temp;
    }
    return $pre;
  }
}