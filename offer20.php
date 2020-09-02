<?php
class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function isNumber($s)
    {
        $s   = strtolower(trim($s));
        $len = strlen($s);
        if (!$len) {
            return false;
        }
        $count = $point = $exp = 0;
        for ($i = 0; $i < $len; $i++) {
            if ($s[$i] == ' ') {
                // 中间有空格
                return false;
            } elseif ($s[$i] == '+' || $s[$i] == '-') {
                // 非开始部分或非e之后有+-符号
                if ($i != 0 && $s[$i - 1] != 'e') {
                    return false;
                }
            } elseif ($s[$i] == '.') {
                if ($point > 0 || $exp > 0) {
                    // 小数点大于1个，或者指数大于1个
                    return false;
                }
                $point++;
            } elseif ($s[$i] == 'e') {
                if ($count == 0 || $exp > 0) {
                    // 如果没有数字，或者已经有指数的情况下
                    return false;
                }
                $exp++;
            } elseif (ord($s[$i]) >= 48 && ord($s[$i]) <= 57) {
                // 为数字
                $count++;
            } else {
                return false;
            }
        }
        if ($count == 0 || $s[$len - 1] == 'e' || $s[$len - 1] == '+' || $s[$len - 1] == '-') {
            // 无数字或最后一位为e+-
            return false;
        }

        return true;
    }
}
