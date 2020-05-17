<?php
/**
 * // This is MountainArray's API interface.
 * // You should not implement it, or speculate about its implementation
 * class MountainArray {
 *     function get($index) {}
 *     function length() {}
 * }
 */

class Solution
{
    /**
     * @param Integer $target
     * @param MountainArray $mountainArr
     * @return Integer
     */
    public function findInMountainArray($target, $mountainArr)
    {
        $top  = $this->findArrayTop($mountainArr, 0, $mountainArr->length() - 1);
        $left = $this->findArrayLeft($mountainArr, 0, $top, $target);
        if ($left != -1) {
            return $left;
        }

        $right = $this->findArrayRight($mountainArr, $top + 1, $mountainArr->length() - 1, $target);
        return $right;
    }

    public function findArrayLeft($mountainArr, $left, $right, $target)
    {
        while ($left <= $right) {
            $mid = floor(($right - $left) / 2) + $left;
            if ($mountainArr->get($mid) == $target) {
                return $mid;
            }

            if ($mountainArr->get($mid) > $target) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return -1;
    }

    public function findArrayRight($mountainArr, $left, $right, $target)
    {
        while ($left <= $right) {
            $mid = floor(($right - $left) / 2) + $left;
            if ($mountainArr->get($mid) == $target) {
                return $mid;
            }

            if ($mountainArr->get($mid) > $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }
        return -1;
    }

    public function findArrayTop($mountainArr, $left, $right)
    {
        $top = 0;
        while ($left <= $right) {
            $mid = floor(($right - $left) / 2) + $left;
            if ($mountainArr->get($mid) > $mountainArr->get($mid + 1)) {
                $top   = $mid;
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
        return $top;
    }
}
