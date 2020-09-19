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
    public function sumOfLeftLeaves($root)
    {
        if (!$root) {
            return 0;
        }

        $sum = 0;
        if ($root->left != null && $root->left->left == null && $root->left->right == null) {
            $sum += $root->left->val;
        }
        return $this->sumOfLeftLeaves($root->left) + $this->sumOfLeftLeaves($root->right) + $sum;
    }

}
