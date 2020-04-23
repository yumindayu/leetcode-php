<?php
class Solution
{
    /**
     * @param String $s1
     * @param Integer $n1
     * @param String $s2
     * @param Integer $n2
     * @return Integer
     */
    public function getMaxRepetitions($s1, $n1, $s2, $n2)
    {
        $repeat   = [];
        $nextChar = [];
        for ($i = 0; $i < strlen($s2); $i++) {
            $count = 0;
            $index = $i;
            for ($j = 0; $j < strlen($s1); $j++) {
                if ($s1[$j] == $s2[$index]) {
                    $index++;
                    if ($index == strlen($s2)) {
                        $index = 0;
                        $count++;
                    }
                }
            }
            $nextChar[$i] = $index;
            $repeat[$i]   = $count;
        }
        $res  = 0;
        $next = 0;

        for ($i = 0; $i < $n1; $i++) {
            $res += $repeat[$next];
            $next = $nextChar[$next];
        }

        return floor($res / $n2);
    }
}

$test = new Solution;
$s1   = "abc";
$n1   = 4;
$s2   = "abc";
$n2   = 2;
$s1   = "aaa";
$n1   = 3;
$s2   = "aa";
$n2   = 1;
$ret  = $test->getMaxRepetitions($s1, $n1, $s2, $n2);
var_dump($ret);
