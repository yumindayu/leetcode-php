<?php
class Solution
{

    /**
     * @param String $name
     * @param String $typed
     * @return Boolean
     */
    public function isLongPressedName($name, $typed)
    {
        $i     = 0; //name字符串的指针
        $index = 0; //typed字符串的指针
        while ($index < strlen($typed)) {
            if ($i < strlen($name) && $name[$i] == $typed[$index]) {
                $i++;
                $index++;
            } else {
                if ($index == 0) {
                    return false;
                }

                if ($typed[$index] != $typed[$index - 1]) {
                    return false;
                }

                $index++;
            }
        }
        //最后如果name都验证完了没有遗漏的字符则是true
        return $i == strlen($name);
    }
}
