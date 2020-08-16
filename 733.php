<?php
class Solution
{

    public $direction = [[0, 1], [1, 0], [0, -1], [-1, 0]];
    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $newColor
     * @return Integer[][]
     */
    public function floodFill($image, $sr, $sc, $newColor)
    {
        $m = count($image);
        $n = count($image[0]);

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == $sr && $j == $sc) {
                    $this->fill($image, $i, $j, $m, $n, $image[$sr][$sc], $newColor);
                }
            }
        }
        return $image;

    }

    public function fill(&$image, $row, $col, $m, $n, $old, $newColor)
    {
        if ($row < 0 || $row >= $m || $col < 0 || $col >= $n) {
            return;
        }

        if ($image[$row][$col] == $newColor) {
            return;
        }

        if ($image[$row][$col] != $old) {
            return;
        }

        $image[$row][$col] = $newColor;
        foreach ($this->direction as $direction) {
            $newrow = $row + $direction[0];
            $newcol = $col + $direction[1];
            $this->fill($image, $newrow, $newcol, $m, $n, $old, $newColor);
        }

    }
}
