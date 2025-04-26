<?php
$array = ['a' => 1, 'b' => 2, 'c' => 3];
$keys = array_keys($array);
$values = array_values($array);

echo "Ключи: ";
print_r($keys);
echo "Значения: ";
print_r($values);


$numbers = [1, 2, 3, 4, 5];
array_unshift($numbers, 0);
array_push($numbers, 6);
echo "Массив после добавления элементов: ";
print_r($numbers);

if (isset($_GET['number'])) {
    $number = (int)$_GET['number'];
    echo "Квадрат числа $number: " . ($number ** 2);
}


$daysOfWeek = [
    1 => 'Понедельник',
    2 => 'Вторник',
    3 => 'Среда',
    4 => 'Четверг',
    5 => 'Пятница',
    6 => 'Суббота',
    7 => 'Воскресенье'
];

$day = 3;
echo "День недели для $day: " . $daysOfWeek[$day];


$twoDimensionalArray = [[1, 2, 3], [4, 5], [6]];
$sum = 0;

foreach ($twoDimensionalArray as $subArray) {
    foreach ($subArray as $value) {
        $sum += $value;
    }
}

echo "Сумма элементов двумерного массива: $sum";
?>