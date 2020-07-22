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
     * @param Integer $val
     * @return TreeNode
     */
    public function insertIntoBST($root, $val)
    {
        if ($root == null) {
            return new TreeNode($val);
        }
        if ($root->val > $val) {
            $root->left = $this->insertIntoBST($root->left, $val);
        } else {
            $root->right = $this->insertIntoBST($root->right, $val);
        }
        return $root;
    }
}
