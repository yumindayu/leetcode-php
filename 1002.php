<?php
class Solution
{

    /**
     * @param String[] $A
     * @return String[]
     */
    public function commonChars($A)
    {
        $ans     = [];
        $minfreq = array_fill(0, 26, PHP_INT_MAX);
        foreach ($A as $word) {
            $freg   = array_fill(0, 26, 0);
            $length = strlen($word);
            //先统计每个单词里字符出现的频次
            for ($i = 0; $i < $length; $i++) {
                $freg[ord($word[$i]) - ord('a')]++;
            }
            //单词里字符出现的频次和全局字符出现的频次取最小值，比如前两个单词里都有a 此时a的频次是2，但是第三个单词里没有a，那么将会把a的频次更新成0，所以最后全局频次只要大于0的字符就是最少出现的
            for ($i = 0; $i < 26; $i++) {
                $minfreq[$i] = min($minfreq[$i], $freg[$i]);
            }
        }
        for ($i = 0; $i < 26; $i++) {
            for ($j = 0; $j < $minfreq[$i]; $j++) {
                array_push($ans, chr($i + ord('a')));
            }
        }
        return $ans;
    }
}
