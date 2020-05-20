<?php
class Solution
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList

    step 1

    begin [hit]  -> [hot]  + 1  -> [dot, lot] + 1
    end [cog]

    begin [cog] -> [cog, dog,log] + 1
    end [dot, lot]

    begin [dot, log] -> dog + 1
    end[cog,dog,log]



     * @return Integer
     */
    public function ladderLength($beginWord, $endWord, $wordList)
    {
        $wordsArray = array_flip($wordList); //避免php中in_array O(n)时间复杂度引起的超时
        if (!isset($wordsArray[$endWord])) {
            return 0;
        }

        $beginArray             = [];
        $endArray               = [];
        $visited                = [];
        $len                    = 1;
        $beginArray[$beginWord] = 1;
        $endArray[$endWord]     = 1;
        while (!empty($beginArray)) {
            if (count($beginArray) > count($endArray)) {
                //每次遍历队列中数量少的单词
                $tmp        = $beginArray;
                $beginArray = $endArray;
                $endArray   = $tmp;
            }
            $temp = [];
            foreach ($beginArray as $word => $value) {
                for ($i = 0; $i < strlen($word); $i++) {
                    for ($c = "a"; $c <= 'z'; $c++) {
                        $old      = $word[$i];
                        $word[$i] = $c;
                        if (isset($endArray[$word])) {
                            return $len + 1;
                        }
                        if (!isset($visited[$word]) && isset($wordsArray[$word])) {
                            $temp[$word]    = 1;
                            $visited[$word] = 1;
                        }
                        $word[$i] = $old;
                    }
                }
            }
            $beginArray = $temp;
            $len++;
        }
        return 0;
    }
}
