<?php
$a = 27;
$b = 12;
$hypotenuse = sqrt($a**2 + $b**2);
echo "Гипотенуза: " . number_format($hypotenuse, 2) . "\n";


$hunter = 'охотник';
$wants_to = 'желает';
$know = 'знать';
$fizan = 'фазан';
$sits = 'сидит';

$mnemonic_phrase = "$hunter $wants_to $know $fizan, $sits.";
echo "Мнемоническая фраза: $mnemonic_phrase\n";

$a = 5.7;
$b = 4.2;
$c = '7.4';
$d = '8.9кг';

$floor_a = floor($a);
$ceil_a = ceil($a);
$floor_b = floor($b);
$ceil_b = ceil($b);
$floor_c = floor((float)$c);
$ceil_c = ceil((float)$c);
$floor_d = floor((float)filter_var($d, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
$ceil_d = ceil((float)filter_var($d, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));

echo "Округление:\n";
echo "a: Пол: $floor_a, Потолок: $ceil_a\n";
echo "b: Пол: $floor_b, Потолок: $ceil_b\n";
echo "c: Пол: $floor_c, Потолок: $ceil_c\n";
echo "d: Пол: $floor_d, Потолок: $ceil_d\n";

$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

$variables = [
    'a' => $a,
    'b' => $b,
    'c' => $c,
    'd' => $d,
    'g' => $g,
    'f' => $f,
];

echo "Приведение типов к bool:\n";
echo "| Исходный тип | Полученное значение |\n";
echo "|--------------|---------------------|\n";
foreach ($variables as $key => $value) {
    echo "| " . gettype($value) . "          | " . (bool)$value . "                |\n";
}

$number = 362525200;
$scientific_notation = sprintf("%.2e", $number);
echo "Научная нотация: $scientific_notation\n";
?>