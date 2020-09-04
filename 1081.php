<?php
class Solution
{

    /**
     * @param String $text
     * @return String
     */
    public function smallestSubsequence($text)
    {
        $count = [];
        for ($i = 0; $i < strlen($text); $i++) {
            if (isset($count[$text[$i]])) {
                $count[$text[$i]]++;
            } else {
                $count[$text[$i]] = 1;
            }
        }
        $visited = []; //这个visited可以不需要，假如不需要visited下面也可以通过判断是不是在stack中，此时需要用到in_array,不是O(1)的时间复杂度，leetcode的结果也能说明，两个方法都列出来，可以比较一下
        $stack   = [];
        for ($i = 0; $i < strlen($text); $i++) {
            $count[$text[$i]]--;
            if (isset($visited[$text[$i]])) {
                continue;
            }
            while (!empty($stack) && end($stack) > $text[$i] && $count[end($stack)] > 0) {
                unset($visited[end($stack)]);
                array_pop($stack);
            }
            $visited[$text[$i]] = true;
            array_push($stack, $text[$i]);
        }
        return implode("", $stack);
    }
}
