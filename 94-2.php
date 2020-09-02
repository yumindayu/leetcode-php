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
    public function inorderTraversal($root)
    {
        $list  = [];
        $stack = new SplStack;

        $cur = $root;
        while ($cur != null || !$stack->isEmpty()) {
            if ($cur != null) {
                $stack->push($cur);
                $cur = $cur->left;
            } else {
                $cur = $stack->pop();
                array_push($list, $cur->val);
                $cur = $cur->right;
            }
        }
        return $list;
    }
}
