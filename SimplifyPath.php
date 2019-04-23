<?php
class Solution {

  /**
   * @param String $path
   * @return String

   输入："/a/./b/../../c/"
   输出："/c"
   */
  function simplifyPath($path) {
    $array = explode('/', $path);
    $stack = [];
    foreach ($array as $v) {
      if ($v == "..") {
        if (!empty($stack)) {
          array_pop($stack);
        }
      } else if ($v != "" && $v != ".") {
        array_push($stack, $v);
      }
    }
    return empty($stack) ? '/' : "/" . implode('/', $stack);
  }
}