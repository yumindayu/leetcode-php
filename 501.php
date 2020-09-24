<?php
class Solution
{
    // 结果集
    protected $ans = [];
    // 遍历到当前节点，前一个节点的值
    protected $pre = null;
    // 众数出现的次数
    protected $maxCount = 0;
    // 当前节点值出现的次数
    protected $count = 0;

    public function findMode($root)
    {
        $this->dfs($root);
        return $this->ans;
    }

    private function dfs($root)
    {
        if ($root === null) {
            return;
        }

        $this->dfs($root->left);

        // 当前为第一个节点，特例
        if ($this->pre === null) {
            $this->maxCount++;
            $this->count++;
            $this->pre = $root->val;
        } elseif ($root->val === $this->pre) {
            // 当前节点值与前一个节点值相同，更新当前节点值出现的次数
            $this->count++;
        } else {
            // 当前节点值与前一个节点值不同，更新当前节点值出现的次数=1
            // 更新前一个节点值
            $this->pre   = $root->val;
            $this->count = 1;
        }

        if ($this->count > $this->maxCount) {
            // 当前节点值出现次数大于众数出现的次数，清空结果集。添加当前元素
            $this->maxCount = $this->count;
            $this->ans      = [$this->pre];
        } elseif ($this->count == $this->maxCount) {
            // 当前节点值出现的次数与众数出现的次数相同，当前节点值也是众数，添加进结果集
            $this->ans[] = $this->pre;
        }

        $this->dfs($root->right);
    }
}
