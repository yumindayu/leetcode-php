<?php
class Solution
{

    public $visited = [];
    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    public function canVisitAllRooms($rooms)
    {
        $queue = [];
        array_push($queue, $rooms[0]);
        $this->visited[0] = true;
        while (!empty($queue)) {
            $keys = array_shift($queue);

            foreach ($keys as $key) {
                if (isset($this->visited[$key])) {
                    continue;
                }
                $this->visited[$key] = true;
                array_push($queue, $rooms[$key]);
            }
        }
        return count($this->visited) == count($rooms);
    }

}
