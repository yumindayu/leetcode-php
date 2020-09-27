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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    public function lowestCommonAncestor($root, $p, $q)
    {
        //只可能在右子树
        if ($root->val < $p->val && $root->val < $q->val) {
            return $this->lowestCommonAncestor($root->right, $p, $q);
        }
        //只可能在左子树
        if ($root->val > $p->val && $root->val > $q->val) {
            return $this->lowestCommonAncestor($root->left, $p, $q);
        }
        //返回自己
        return $root;

    }
}
