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
   * @return NULL
   *
   * @github https://github.com/yumindayu/leetcode-php


    3
   / \
  1   4
     /
    2

  1 3 2 4 
   */
  public $firstNode;

  public $secondNode;

  public $pre;
  function recoverTree($root) {
    if ($root == null) return;
    $this->helper($root);
    $temp = $this->firstNode->val;
    $this->firstNode->val = $this->secondNode->val;
    $this->secondNode->val = $temp;
  }

  function helper($root) {
    if ($root == null) return;
    $this->helper($root->left);
    if ($this->pre == null) {
      $this->pre = $root;
    } else {
      if ($this->pre->val > $root->val) {
        if ($this->firstNode == null) {
          $this->firstNode = $this->pre;
        }
        $this->secondNode = $root;
      }
      $this->pre = $root;
    }
    $this->helper($root->right);
  }
}