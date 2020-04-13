<?php
class Solution
{

    /**
     * @param String $palindrome
     * @return String
     */
    public function breakPalindrome($palindrome)
    {
        if ($palindrome == "" || strlen($palindrome) <= 1) {
            return "";
        }

        for ($i = 0; $i < floor(strlen($palindrome) / 2); $i++) {
            if ($palindrome[$i] != 'a') {
                return substr($palindrome, 0, $i) . 'a' . substr($palindrome, $i + 1);
            }
        }
        return substr($palindrome, 0, strlen($palindrome) - 1) . 'b';
    }
}
