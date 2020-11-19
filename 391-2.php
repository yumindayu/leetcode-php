<?php
class Solution
{

    /**
     * @param Integer[][] $rectangles
     * @return Boolean
     */
    public function isRectangleCover($rectangles)
    {
        $X1   = PHP_INT_MAX;
        $Y1   = PHP_INT_MAX;
        $X2   = PHP_INT_MIN;
        $Y2   = PHP_INT_MIN;
        $set  = [];
        $area = 0;
        foreach ($rectangles as $rectangle) {
            $x1 = $rectangle[0];
            $y1 = $rectangle[1];
            $x2 = $rectangle[2];
            $y2 = $rectangle[3];

            $X1 = min($X1, $x1);
            $Y1 = min($Y1, $y1);
            $X2 = max($X2, $x2);
            $Y2 = max($Y2, $y2);
            $area += ($x2 - $x1) * ($y2 - $y1);

            $p1 = $x1 . " " . $y1;
            $p2 = $x1 . " " . $y2;
            $p3 = $x2 . " " . $y1;
            $p4 = $x2 . " " . $y2;
            if (!isset($set[$p1])) {
                $set[$p1] = 1;
            } else {
                unset($set[$p1]);
            }
            if (!isset($set[$p2])) {
                $set[$p2] = 1;
            } else {
                unset($set[$p2]);
            }
            if (!isset($set[$p3])) {
                $set[$p3] = 1;
            } else {
                unset($set[$p3]);
            }
            if (!isset($set[$p4])) {
                $set[$p4] = 1;
            } else {
                unset($set[$p4]);
            }
        }
        $bigArea = ($X2 - $X1) * ($Y2 - $Y1);
        if ($area != $bigArea) {
            return false;
        }

        if (count($set) != 4) {
            return false;
        }

        if (!isset($set[$X1 . " " . $Y1])) {
            return false;
        }

        if (!isset($set[$X1 . " " . $Y2])) {
            return false;
        }

        if (!isset($set[$X2 . " " . $Y1])) {
            return false;
        }

        if (!isset($set[$X2 . " " . $Y2])) {
            return false;
        }

        return true;
    }
}
