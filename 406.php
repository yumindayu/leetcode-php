<?php
class Solution
{

    /**
     * @param Integer[][] $people
     * @return Integer[][]
     */
    public function reconstructQueue($people)
    {
        usort($people, function ($a, $b) {
            return $a[0] == $b[0] ? $a[1] - $b[1] : $b[0] - $a[0];
        });
        $list = new SplDoublyLinkedList();
        foreach ($people as $p) {
            $list->add($p[1], $p);
        }
        $ans = [];
        foreach ($list as $val) {
            $ans[] = $val;
        }

        return $ans;

    }
}
