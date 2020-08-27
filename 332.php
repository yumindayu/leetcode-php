<?php
class Solution
{

    /**
     * @param String[][] $tickets
     * @return String[]
     */
    public function findItinerary($tickets)
    {
        $maps = [];
        foreach ($tickets as $ticket) {
            $maps[$ticket[0]][] = $ticket[1];
        }

        foreach ($maps as $k => $v) {
            sort($maps[$k]);
        }

        $ans = [];
        $this->dfs($maps, "JFK", $ans);
        return array_reverse($ans);
    }

    public function dfs(&$maps, $from, &$ans)
    {
        while (!empty($maps[$from])) {
            $this->dfs($maps, array_shift($maps[$from]), $ans);
        }

        array_push($ans, $from);
    }

}
