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
    public $pre = null;
    public $ans = PHP_INT_MAX;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    public function getMinimumDifference($root)
    {
        $this->dfs($root);
        return $this->ans;
    }

    public function dfs($root)
    {
        if ($root == null) {
            return;
        }
        $this->dfs($root->left);
        if ($this->pre != null) {
            $this->ans = min($this->ans, $root->val - $this->pre->val);
        }
        $this->pre = $root;
        $this->dfs($root->right);
    }
}
