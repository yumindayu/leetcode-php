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
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return TreeNode
     */
    public function mergeTrees($t1, $t2)
    {
        if ($t1 == null && $t2 == null) {
            return;
        }
        $val = 0;
        if ($t1 != null) {
            $val += $t1->val;
        }
        if ($t2 != null) {
            $val += $t2->val;
        }
        $root        = new TreeNode($val);
        $root->left  = $this->mergeTrees($t1->left, $t2->left);
        $root->right = $this->mergeTrees($t1->right, $t2->right);
        return $root;
    }
}
