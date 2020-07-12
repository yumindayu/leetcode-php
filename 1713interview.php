<?php
class Solution
{

    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return Integer
     */
    public function respace($dictionary, $sentence)
    {
        // 1. 先尝试暴力解法
        // 2. 优化，排除到一些不可能的情况
        $n = strlen($sentence);
        if ($n == 0) {
            return 0;
        }

        // 字典里所有单词结束位置的哈希
        $end = $length = [];
        foreach ($dictionary as $word) {
            if (!isset($end[$word[strlen($word) - 1]])) {
                $end[$word[strlen($word) - 1]] = true;
            }

            if (!isset($length[strlen($word)])) {
                $length[strlen($word)] = true;
            }

        }
        // dp[i]表示sentence前i个字符所得结果
        $dp = array_fill(0, $n + 1, 0);
        for ($i = 1; $i <= $n; ++$i) {
            // 先假设当前字符作为单词不在字典中
            $dp[$i] = $dp[$i - 1] + 1;
            // 不以当前字母结尾，直接跳过
            if (!isset($end[$sentence[$i - 1]])) {
                continue;
            }

            for ($j = 0; $j < $i; ++$j) {
                // 长度不在字典内，直接跳过
                if (!isset($length[$i - $j])) {
                    continue;
                }

                $seg = substr($sentence, $j, $i - $j);
                if (in_array($seg, $dictionary)) {
                    $dp[$i] = min($dp[$i], $dp[$j]);
                }
            }
        }

        return $dp[$n];

    }
}
