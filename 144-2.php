<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public function preorderTraversal($root)
    {
        $list  = [];
        $stack = new SplStack;

        $cur = $root;
        while ($cur != null || !$stack->isEmpty()) {
            while ($cur != null) {
                array_push($list, $cur->val);
                $stack->push($cur);
                $cur = $cur->left;
            }
            $cur = $stack->pop();
            $cur = $cur->right;
        }
        return $list;
    }
}
