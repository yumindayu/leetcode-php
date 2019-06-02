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
   * @param TreeNode $p
   * @param TreeNode $q
   * @return Boolean
   * @github https://github.com/yumindayu/leetcode-php
   */
  function isSameTree($p, $q) {
    if ($p == null && $q == null) return true;
    if ($p != null && $q != null && $p->val == $q->val) {
      return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
    return false;
  }
}