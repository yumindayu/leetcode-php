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

    public $res = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     * 0:表示节点没有被其他摄像头覆盖 1:节点已被其他摄像头覆盖 2: 节点没被覆盖，并且需要安装摄像头覆盖别的节点
     * 后序遍历
     */
    public function minCameraCover($root)
    {
        if ($this->dfs($root) == 0) {
            //遍历完发现根节点是0 则再加一个
            $this->res++;
        }
        return $this->res;
    }

    public function dfs($node)
    {
        if ($node == null) {
            return 1;
        }

        $left  = $this->dfs($node->left);
        $right = $this->dfs($node->right);
        //左右子节点只要有一个没被覆盖，则该节点需要安装摄像头
        if ($left == 0 || $right == 0) {
            $this->res++;
            return 2;
        }
        //左右孩子均为已覆盖状态,则当前节点未被覆盖，标志为0
        if ($left == 1 && $right == 1) {
            return 0;
        }

        //若左右孩子为一个覆盖一个放置了摄像头，则当前节点为已被覆盖，标志为1
        if ($left + $right >= 3) {
            return 1;
        }
        //此时已经组合完了根节点所有情况，随便返回一个整数即可
        return 0;

    }
}
