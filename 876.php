<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     * @github https://github.com/yumindayu/leetcode-php

    1 -> 2 -> 3 -> 4 -> 5 -> 6

     */
    public function middleNode($head)
    {
        $count = 0;
        $cur   = $head;
        while ($cur != null) {
            $count++;
            $cur = $cur->next;
        }
        if ($count == 1) {
            return $head;
        }

        $middle = floor($count / 2);
        $node   = $head;
        $count  = 0;
        while ($node != null) {
            $count++;
            if ($count == $middle) {
                return $node->next;
            }
            $node = $node->next;
        }

    }
    public function middleNode2($head)
    {
        $slow = $fast = $head;
        while ($fast != null && $fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }
}
