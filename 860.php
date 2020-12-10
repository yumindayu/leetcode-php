<?php
class Solution
{

    /**
     * @param Integer[] $bills
     * @return Boolean
     */
    public function lemonadeChange($bills)
    {
        $five = 0;
        $ten  = 0;
        for ($i = 0; $i < count($bills); $i++) {
            if ($bills[$i] == 5) {
                $five++;
            }
            if ($bills[$i] == 10) {
                $five--;
                $ten++;
            }
            if ($bills[$i] == 20) {
                if ($ten > 0 && $five > 0) {
                    $ten--;
                    $five--;
                } else {
                    $five -= 3;
                }
            }
            if ($five < 0) {
                return false;
            }
        }
        return true;
    }
}
