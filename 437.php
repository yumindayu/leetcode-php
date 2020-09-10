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
     * @param Integer $sum
     * @return Integer
     */
    public function pathSum($root, $sum)
    {
        if ($root == null) {
            return 0;
        }

        return $this->helper($root, 0, $sum) + $this->pathSum($root->left, $sum) + $this->pathSum($root->right, $sum);
    }

    public function helper($node, $cur, $sum)
    {
        if ($node == null) {
            return 0;
        }

        $cur += $node->val;
        $count = $cur == $sum ? 1 : 0;
        return $count + $this->helper($node->left, $cur, $sum) + $this->helper($node->right, $cur, $sum);
    }
}
