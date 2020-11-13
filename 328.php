<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function oddEvenList($head)
    {
        $o = $head;
        $p = $head->next;
        $e = $p;
        while ($o->next && $e->next) {
            $o->next = $e->next;
            $o       = $o->next;
            $e->next = $o->next;
            $e       = $e->next;
        }
        $o->next = $p;
        return $head;
    }
}
