<?php
class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    public function reverseBits($n)
    {
        $res = 0;
        for ($i = 0; $i < 32; $i++) {
            //空出一位
            $res <<= 1;
            //加上n最后一位
            $res += $n & 1;
            $n >>= 1;
        }
        return $res;

    }
}
