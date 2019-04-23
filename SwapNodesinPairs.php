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
    
     两两交换链表中的节点
     给定 1->2->3->4, 你应该返回 2->1->4->3.

           node1   node2  next
     dummy-> 1   ->  2 ->  3 ->  4 ->  5
                  
     dummy-> 2 -> 1 -> 3 -> 4 -> 5
     
     */
    function swapPairs($head) {
      $dummyhead = new ListNode(0);
      $dummyhead->next = $head;
      $q = $dummyhead;
      while ($q->next && $q->next->next) {
        $node1 = $q->next;
        $node2 = $node1->next;
        $next = $node2->next;

        $node2->next = $node1;
        $node1->next = $next;
        $q->next = $node2;
        $q = $node1;
      }
      return $dummyhead->next;
    }
}