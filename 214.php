<?php
class Solution
{

    /**
     * @desc 生成回文字符串
     * @param $s
     * @return string
     */
    public function shortestPalindrome($s)
    {
        $temp = '';
        $len  = strlen($s);
        if (!$this->palindrome($s)) {
            for ($i = 0; $i < $len - 1; $i++) {
                //每一次从尾部依次取一个下标字符串到前面
                $temp = $temp . $s[$len - 1 - $i];
                if ($this->palindrome($temp . $s)) {
                    return $temp . $s;
                }
            }
        }
        return $s;
    }

    /**
     * @param $string
     * @return bool
     * 简单暴力验证是否回文串超时,所以用一半一半直接判等比较
     */
    public function palindrome($string)
    {
        $len    = strlen($string);
        $is_odd = ($len % 2 == 0) ? 0 : 1;
        $midd   = $len / 2;
        //从0位置开始，截取字符串前几位数字
        $f_string = substr($string, 0, $midd);
        //从上一个截取的结束位置起（奇数 + 1），截取字符串后几位数字，并反转字符串
        $b_string = strrev(substr($string, $midd + $is_odd, $midd));
        if ($f_string != $b_string) {
            return false;
        }
        return true;
    }
}
