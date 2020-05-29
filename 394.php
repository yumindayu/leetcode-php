<?php
class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function decodeString($s)
    {
        $stack  = [];
        $ans    = "";
        $repeat = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] != ']') {
                if (is_numeric($s[$i])) {
                    $repeat = $repeat * 10 + $s[$i];
                } else {
                    if ($repeat != 0) {
                        array_push($stack, $repeat);
                        $repeat = 0;
                    }
                    array_push($stack, $s[$i]);
                }
            } else {
                $temp = "";
                $data = "";
                $str  = "";
                while ($data != '[') {
                    $data = array_pop($stack);
                    if ($data != '[') {
                        $str = $data . $str;
                    }
                }
                $repeat = array_pop($stack);
                for ($j = 0; $j < $repeat; $j++) {
                    $temp .= $str;
                }
                if (!empty($stack)) {
                    for ($k = 0; $k < strlen($temp); $k++) {
                        array_push($stack, $temp[$k]);
                    }
                } else {
                    $ans .= $temp;
                }
                $repeat = 0;
            }
        }
        while (!empty($stack)) {
            $ans .= array_shift($stack);
        }
        return $ans;
    }
}
