<?php

function task1($str) {
    return preg_replace('/(?<=[^b])aaa/', '!', $str);
}

echo "1) " . task1("waaa baaa caaa") . "\n";

function task2($str) {
    return preg_replace_callback('/\d/', function($match) {
        $digit = $match[0];
        eval("\$result = '$digit' . '$digit';");
        return $result;
    }, $str);
}

echo "2) " . task2("a1b2c3") . "\n";

function task3($str) {
    preg_match_all('/ab{1,3}a/', $str, $matches);
    return implode(' ', $matches[0]);
}

echo "3) " . task3("aa aba abba abbba abbbba abbbbba") . "\n";

function task4($str) {
    preg_match_all('/a..a/', $str, $matches);
    return implode(' ', $matches[0]);
}

echo "4) " . task4("aba aca aea abba adca abea") . "\n";

?>
