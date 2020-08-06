<?php
class Solution
{

    /**
     * @param String[] $words
     * @return Integer[][]
     * ["abcd","dcba","lls","s","sssll"]
     */
    public function palindromePairs($words)
    {
        $n   = count($words);
        $map = [];

        for ($i = 0; $i < $n; $i++) {
            $map[strrev($words[$i])] = $i;
        }
        $ret = [];
        for ($i = 0; $i < $n; $i++) {
            $m = strlen($words[$i]);
            for ($j = 0; $j <= $m; $j++) {
                //所有后缀
                if ($this->isPalindrome($words[$i], $j, $m - 1)) {
                    $other_left = $this->findWord($map, $words[$i], 0, $j - 1);
                    if ($other_left != -1 && $other_left != $i) {
                        $array = [$i, $other_left];
                        array_push($ret, $array);
                    }
                }
                //所有前缀
                if ($j != 0 && $this->isPalindrome($words[$i], 0, $j - 1)) {
                    $other_right = $this->findWord($map, $words[$i], $j, $m - 1);
                    if ($other_right != -1 && $other_right != $i) {
                        $array = [$other_right, $i];
                        array_push($ret, $array);
                    }
                }
            }
        }
        return $ret;

    }

    public function isPalindrome($s, $left, $right)
    {
        $len = $right - $left + 1;
        for ($i = 0; $i < $len / 2; $i++) {
            if ($s[$left + $i] != $s[$right - $i]) {
                return false;
            }
        }
        return true;
    }

    /**
     * Returns if the word is in the map.
     * @param String $word
     * @return Boolean
     */
    public function findWord($map, $s, $left, $right)
    {
        $str = substr($s, $left, $right - $left + 1);
        return isset($map[$str]) ? $map[$str] : -1;
    }
}
