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
    
      (2 -> 4 -> 2)

   +  (5 -> 6 -> 7)
   
      7 0 0 1

     */
    function addTwoNumbers($l1, $l2) {
      $add = 0;
      $list = new ListNode(0);
      $cur = $list;

      while ($l1 || $l2) {
        $x = $l1 != null ? $l1->val : 0;
        $y = $l2 != null ? $l2->val : 0;

        $val = ($x + $y + $add) % 10;

        $add = ($x + $y + $add ) / 10;

        $new = new ListNode($val);
        $cur->next = $new;
        $cur = $cur->next; 

        if ($l1 != null) {
          $l1 = $l1->next;
        }
        if ($l2 != null) {
          $l2 = $l2->next;
        }
      }
      if ($add > 0) {
        $cur->next = new ListNode($add);
      }
      return $list->next;

    }
}