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

    public $res = [];
    /**
     * @param TreeNode $root
     * @return String[]
     */
    public function binaryTreePaths($root)
    {
        if ($root == null) {
            return $this->res;
        }
        $this->helper($root, "");
        return $this->res;
    }

    public function helper($node, $str)
    {
        $str .= $node->val;
        if ($node->left == null && $node->right == null) {
            array_push($this->res, $str);
            return;
        }
        if ($node->left != null) {
            $this->helper($node->left, $str . "->");
        }
        if ($node->right != null) {
            $this->helper($node->right, $str . "->");
        }
    }
}
