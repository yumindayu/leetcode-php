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

    public $root;
    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    public function constructMaximumBinaryTree($nums)
    {
        if (!$nums) {
            return null;
        }

        $index       = array_search(max($nums), $nums);
        $node        = new TreeNode($nums[$index]);
        $node->left  = $this->constructMaximumBinaryTree(array_slice($nums, 0, $index));
        $node->right = $this->constructMaximumBinaryTree(array_slice($nums, $index + 1));
        return $node;
    }

}
