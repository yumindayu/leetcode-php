<?php
class Solution {

  /**
   * @param String[] $strs
   * @return String[][]
   字母异位词分组

    输入: ["eat", "tea", "tan", "ate", "nat", "bat"],
    输出:
    [
      ["ate","eat","tea"],
      ["nat","tan"],
      ["bat"]
    ]
   */
  function groupAnagrams($strs) {
    $result = [];
    for ($i = 0; $i < count($strs); $i++) {
      $key = str_split($strs[$i]);
      sort($key);
      $key = implode('', $key);
      $result[$key][] = $strs[$i];
    }
    return $result;
  }
}