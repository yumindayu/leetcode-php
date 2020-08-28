<?php
class Solution
{

    /**
     * @param String $moves
     * @return Boolean
     */
    public function judgeCircle($moves)
    {
        $x = 0;
        $y = 0;
        for ($i = 0; $i < strlen($moves); $i++) {
            if ($moves[$i] == 'U') {
                $x++;
            }
            if ($moves[$i] == 'D') {
                $x--;
            }
            if ($moves[$i] == 'L') {
                $y--;
            }
            if ($moves[$i] == 'R') {
                $y++;
            }
        }
        return $x == 0 && $y == 0;

    }
}
