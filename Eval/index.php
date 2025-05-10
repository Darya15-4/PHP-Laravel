<?php
function evaluateExpression($input) {
    if (trim($input) === '') return 0;

    $expression = "0+" . str_replace(' ', '', $input);

    $replacements = ['--' => '+', '++' => '+', '+-' => '-', '-+' => '-'];
    foreach ($replacements as $search => $replace) {
        $expression = str_replace($search, $replace, $expression);
    }
    while (preg_match('/([a-z]+)\((-?\d+)\)/i', $expression, $match)) {
        $func = strtolower($match[1]);
        $angle = (float)$match[2];
        $rad = deg2rad($angle);
        $value = 0;

        if ($func === 'sin') $value = sin($rad);
        elseif ($func === 'cos') $value = cos($rad);
        elseif ($func === 'tan') $value = tan($rad);
        elseif ($func === 'cot') $value = (tan($rad) != 0) ? 1 / tan($rad) : NAN;

        $expression = str_replace($match[0], $value, $expression);
    }
    while (preg_match('/(-?\d+\.?\d*)([\/\*])(-?\d+\.?\d*)/', $expression, $match)) {
        $a = (float)$match[1];
        $b = (float)$match[3];
        $op = $match[2];

        if ($op === '/' && $b == 0) return 'division by zero';

        $result = $op === '*' ? $a * $b : $a / $b;
        $expression = str_replace($match[0], $result, $expression);
    }
    while (preg_match('/(-?\d+\.?\d*)([\+\-])(-?\d+\.?\d*)/', $expression, $match)) {
        $a = (float)$match[1];
        $b = (float)$match[3];
        $op = $match[2];

        $result = $op === '+' ? $a + $b : $a - $b;
        $expression = str_replace($match[0], $result, $expression);
    }

    return $expression;
}

echo evaluateExpression('5/8*cos(45)');
?>
