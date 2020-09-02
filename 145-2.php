<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public function postorderTraversal($root)
    {
        $list  = [];
        $stack = new SplStack;
        $cur   = $root;
        while ($cur != null || !$stack->isEmpty()) {
            while ($cur != null) {
                array_unshift($list, $cur->val);
                $stack->push($cur);
                $cur = $cur->right;
            }
            $cur = $stack->pop();
            $cur = $cur->left;
        }
        return $list;
    }
}
