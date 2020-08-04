<?php
class Solution
{
    public $visited = []; //标记访问

    public $edges = []; //有向图

    public $invalid = false;
    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    public function canFinish($numCourses, $prerequisites)
    {
        foreach ($prerequisites as $v) {
            if (isset($this->edges[$v[1]])) {
                array_push($this->edges[$v[1]], $v[0]);
            } else {
                $this->edges[$v[1]][] = $v[0];
            }
        }
        for ($i = 0; $i < $numCourses; $i++) {
            if (!isset($this->visited[$i])) {
                $this->dfs($i);
            }
        }

        return !$this->invalid;
    }
    public function dfs($u)
    {
        if ($this->invalid) {
            return;
        }

        $this->visited[$u] = 1;
        foreach ($this->edges[$u] as $v) {
            if (!isset($this->visited[$v])) {
                $this->dfs($v);
            } elseif ($this->visited[$v] == 1) {
                $this->invalid = true;
            }
        }

        $this->visited[$u] = 2;
    }
}
