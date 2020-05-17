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
     * @param TreeNode $s
     * @param TreeNode $t
     * @return Boolean
     */
    public function isSubtree($s, $t)
    {
        if ($s == $t) {
            return true;
        }

        $s_array = [];
        $t_array = [];
        $s_val   = implode('', $this->dfsOrder($s, $s_array));
        $t_val   = implode('', $this->dfsOrder($t, $t_array));

        return strstr($s_val, $t_val) ? true : false;
    }

    public function dfsOrder($root, &$array)
    {
        if ($root == null) {
            return;
        }
        array_push($array, 'A' . $root->val);
        $root->left != null ? $this->dfsOrder($root->left, $array) : array_push($array, "lnull");
        $root->right != null ? $this->dfsOrder($root->right, $array) : array_push($array, "rnull");
        return $array;
    }
}
