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
     * @param Integer $val
     * @return TreeNode
     */
    public function searchBST($root, $val)
    {
        if ($root == null) {
            return null;
        }
        if ($root->val == $val) {
            return $root;
        }
        if ($root->val < $val) {
            return $this->searchBST($root->right, $val);
        }
        return $this->searchBST($root->left, $val);
    }
}
