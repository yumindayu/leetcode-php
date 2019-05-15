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
class Solution {

  /**
   * @param TreeNode $root
   * @return Boolean
   *
   * @github https://github.com/yumindayu/leetcode-php

           4
          / \
          2  6
         / \ /
        1  3 5
   */
  function isValidBST($root) {
    return $this->valid($root, null, null);
  }

  function valid($root, $min, $max) {
    if (is_null($root)) return true;
    if (!is_null($min) && $root->val <= $min) return false;
    if (!is_null($max) && $root->val >= $max) return false;
    return $this->valid($root->left, $min, $root->val) && $this->valid($root->right, $root->val, $max);
  }


}