<?php
class Solution
{

    /**
     * @param Integer[][] $bookings
     * @param Integer $n
     * @return Integer[]
     */
    public function corpFlightBookings($bookings, $n)
    {
        $nums = array_fill(0, $n, 0);
        foreach ($bookings as $booking) {
            $nums[$booking[0] - 1] += $booking[2];
            if ($booking[1] < $n) {
                $nums[$booking[1]] -= $booking[2];
            }
        }
        for ($i = 1; $i < $n; $i++) {
            $nums[$i] += $nums[$i - 1];
        }
        return $nums;
    }

}
