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
    public function insertionSortList($head)
    {
        $dummy       = new ListNode(0);
        $dummy->next = $head;
        $pre         = null;

        while ($head != null && $head->next != null) {
            if ($head->val <= $head->next->val) {
                $head = $head->next;
                continue;
            }
            $pre = $dummy;
            while ($pre->next->val < $head->next->val) {
                $pre = $pre->next;
            }
            $cur        = $head->next;
            $head->next = $cur->next;
            $cur->next  = $pre->next;
            $pre->next  = $cur;
        }
        return $dummy->next;
    }
}
