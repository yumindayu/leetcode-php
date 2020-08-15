<?php
class Solution
{

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    public function multiply($num1, $num2)
    {
        if ($num1 == "0" || $num2 == "0") {
            return "0";
        }

        $m     = strlen($num1);
        $n     = strlen($num2);
        $array = [];
        for ($i = $m - 1; $i >= 0; $i--) {
            for ($j = $n - 1; $j >= 0; $j--) {
                $array[$i + $j + 1] += $num1[$i] * $num2[$j];
            }
        }
        $res = "";
        for ($i = $m + $n - 1; $i >= 0; $i--) {
            if ($array[$i] > 9) {
                $array[$i - 1] += floor($array[$i] / 10);
                $array[$i] %= 10;
            }
            $res = (string) $array[$i] . $res;
        }
        return $res;
    }
}
