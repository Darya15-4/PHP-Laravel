<?php 

$str_task1 = 'a1b2c3';
$res_task1 = preg_replace('/(\d)/','$1$1', $str_task1);
echo "$res_task1 <br>";
/*это удвоение*/



$str_task2 = '"bbb /aaa\ bbb /ccc\"';
$res_task2 = preg_replace('/\/.*?\\\\/','!', $str_task2);
echo "$res_task2 <br>";
/*заменяет /...\ на ! */



$str_task3 = "bbb /aaa\\ bbb /ccc\\";
$res_task3 = preg_replace('/\/.*?\\\\/', '!', $str_task3);
echo "$res_task3 <br>";




$str_task4 = 'aa aba abba abbba abbbba abbbbba';
preg_match_all('/\bab{4,}a\b/', $str_task4, $matches4);
print_r($matches4[0]);
/* слова, которые начинаются и заканчиваются на a, а между ними четыре или более b */



$str_task5 = 'aba aea aca aza axa a-a a#a';
preg_match_all('/a[^ex]a/', $str_task5, $matches5);
print_r($matches5[0]);
/* подстроки, где буква a идет, потом любой символ, кроме e или x, и снова a */


?>