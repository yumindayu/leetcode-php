<?php
class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    public function fib($n)
    {
        if ($n == 0) {
            return 0;
        }

        // $fib = [];
        // $fib[0] = 0;
        // $fib[1] = 1;
        // for ($i = 2; $i <= $n; $i++) {
        //     $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        // }
        // return $fib[$n];

        $first  = 0;
        $second = 1;
        for ($i = 2; $i <= $n; $i++) {
            $tmp    = $second;
            $second = $first + $second;
            $first  = $tmp;
        }
        return $second;
    }
}
