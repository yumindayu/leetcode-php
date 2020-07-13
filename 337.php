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
     * @return Integer
     */
    public function rob($root)
    {
        $res = $this->dfs($root);
        return max($res);
    }

    public function dfs($node)
    {
        if ($node == null) {
            return [0, 0];
        }

        $left  = $this->dfs($node->left);
        $right = $this->dfs($node->right);

        $dp    = [];
        $dp[0] = max($left[0], $left[1]) + max($right[0], $right[1]); //当前跟节点不抢
        $dp[1] = $node->val + $left[0] + $right[0]; //当前跟节点抢
        return $dp;
    }
}
