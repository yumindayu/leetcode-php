<?php
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function removeDuplicateLetters($s)
    {
        $count = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($count[$s[$i]])) {
                $count[$s[$i]]++;
            } else {
                $count[$s[$i]] = 1;
            }
        }
        $visited = []; //这个visited可以不需要，假如不需要visited下面也可以通过判断是不是在stack中，此时需要用到in_array,不是O(1)的时间复杂度，leetcode的结果也能说明，两个方法都列出来，可以比较一下
        $stack   = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $count[$s[$i]]--;
            if (isset($visited[$s[$i]])) {
                continue;
            }
            while (!empty($stack) && end($stack) > $s[$i] && $count[end($stack)] > 0) {
                unset($visited[end($stack)]);
                array_pop($stack);
            }
            $visited[$s[$i]] = true;
            array_push($stack, $s[$i]);
        }
        return implode("", $stack);
    }

    /**
     * @param String $s
     * @return String
     */
    public function removeDuplicateLetters2($s)
    {
        $count = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (isset($count[$s[$i]])) {
                $count[$s[$i]]++;
            } else {
                $count[$s[$i]] = 1;
            }
        }

        $stack = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $count[$s[$i]]--;
            if (in_array($s[$i], $stack)) {
                continue;
            }
            while (!empty($stack) && end($stack) > $s[$i] && $count[end($stack)] > 0) {
                array_pop($stack);
            }
            array_push($stack, $s[$i]);
        }
        return implode("", $stack);
    }
}
