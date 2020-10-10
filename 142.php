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
     */
    public function detectCycle($head)
    {
        $slow = $head;
        $fast = $head;
        while (true) {
            if ($fast == null || $fast->next == null) {
                return null;
            }

            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow == $fast) {
                break;
            }
        }
        $fast = $head;
        while ($fast != $slow) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        return $fast;
    }
}
