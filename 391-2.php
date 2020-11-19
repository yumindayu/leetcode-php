<?php
class Solution
{

    /**
     * @param Integer[][] $rectangles
     * 1. 先计算大矩形的左下角和右上角坐标，很好算 取index0 index1的最小值就是左下角，index2 index3就是右上角
     * 2. 计算这个大矩形面积是不是等于所有小矩形的面积和
     * 2. 如果是完美矩形 最终只有四个角，其他都是重合的，用一个set来存储矩形的角，最后如果set里是四个元素，且这四个角就是上面计算出来的大矩形的四个角则为true
     * @return Boolean
     */
    public function isRectangleCover($rectangles)
    {
        //初始化四个点
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
            //计算大矩形的左下角坐标和右上角坐标
            $X1 = min($X1, $x1);
            $Y1 = min($Y1, $y1);
            $X2 = max($X2, $x2);
            $Y2 = max($Y2, $y2);
            //计算小矩形面积和
            $area += ($x2 - $x1) * ($y2 - $y1);

            //矩形四个角的坐标
            $p1 = $x1 . " " . $y1;
            $p2 = $x1 . " " . $y2;
            $p3 = $x2 . " " . $y1;
            $p4 = $x2 . " " . $y2;
            //如果一个角已经在set里说明角重合了，删除该角 否则加进去
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
        //判断面积
        $bigArea = ($X2 - $X1) * ($Y2 - $Y1);
        if ($area != $bigArea) {
            return false;
        }
        //判断是否最终有且仅有4个角
        if (count($set) != 4) {
            return false;
        }
        //如果是4个角还要判断是不是就是一开始计算出来的大矩形的四个角，也就是通过min 和 max计算出来四个角
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
