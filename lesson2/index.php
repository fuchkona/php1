<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 2 by Nik</title>
</head>
<body>
<h3>Task 1</h3>
<?php
$a = rand(-100, 100);
$b = rand(-100, 100);

if ($a >= 0 && $b >= 0) {
    echo "$a-$b=" . ($a - $b);
} else if ($a < 0 && $b < 0) {
    echo "$a*$b=" . ($a * $b);
} else {
    echo "$a+$b=" . ($a + $b);
}
?>
<hr>
<h3>Task 2</h3>
<?php
$a = rand(0, 15);
echo "a=$a ";
switch ($a) {
    case 1:
        echo 1;
    case 2:
        echo 2;
    case 3:
        echo 3;
    case 4:
        echo 4;
    case 5:
        echo 5;
    case 6:
        echo 6;
    case 7:
        echo 7;
    case 8:
        echo 8;
    case 9:
        echo 9;
    case 10:
        echo 10;
    case 11:
        echo 11;
    case 12:
        echo 12;
    case 13:
        echo 13;
    case 14:
        echo 14;
    case 15:
        echo 15;
}
?>
<hr>
<h3>Task3</h3>
<?php
function sum($a, $b)
{
    return $a + $b;
}

function sub($a, $b)
{
    return $a - $b;
}

function div($a, $b)
{
    return $b ? $a / $b : null;
}

function mult($a, $b)
{
    return $a * $b;
}

$a = rand(-100, 100);
$b = rand(-100, 100);
?>
<p>a=<?= $a ?></p>
<p>b=<?= $b ?></p>
<p>Sum <?= sum($a, $b) ?></p>
<p>Sub <?= sub($a, $b) ?></p>
<p>Mult <?= mult($a, $b) ?></p>
<p>Div <?= div($a, $b) ?></p>
<hr>
<h3>Task4</h3>
<?php
const MULT = 0;
const DIV = 1;
const SUM = 2;
const SUB = 3;

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case MULT:
            return mult($arg1, $arg2);
        case DIV:
            return div($arg1, $arg2);
        case SUM:
            return sum($arg1, $arg2);
        case SUB:
            return sub($arg1, $arg2);
        default:
            return null;
    }
}

$a = rand(-100, 100);
$b = rand(-100, 100);
?>
<p>a=<?= $a ?></p>
<p>b=<?= $b ?></p>
<p>Sum <?= mathOperation($a, $b, SUM) ?></p>
<p>Sub <?= mathOperation($a, $b, SUB) ?></p>
<p>Mult <?= mathOperation($a, $b, MULT) ?></p>
<p>Div <?= mathOperation($a, $b, DIV) ?></p>
<hr>
<h3>Task 6</h3>
<?php
function power($val, $pow) {
    if ($pow > 1) {
        $val *= power($val, --$pow);
    }
    return $val;
}

for($i = 0; $i < 10; $i++) {
    $val = rand(0, 10);
    $pow = rand(0, 10);
    echo "<p>$val^$pow=" . power($val, $pow) . "</p>";
}
?>
<hr>
<h3>Task 7</h3>
<?php
function getRusTime($h = null, $m = null) {
    $date = new DateTime();
    $h = !is_null($h) ? $h : $date->format('H');
    $m = !is_null($m) ? $m : $date->format('i');
    if ($h >= 0 && $h < 24 && $m >= 0 && $m < 60) {
        return $h . getRusHour($h) . " $m" . getRusMinutes($m);
    } else {
        return null;
    }
}

function getRusHour($h) {
    $result = ' час';
    if ($h > 1 && $h < 5 || $h > 21 && $h < 25) {
        $result .= 'а';
    } else if ($h != 1) {
        $result .= 'ов';
    }
    return $result;
}

function getRusMinutes($m) {
    $result = ' минут';
    if ($m == 1 || $m == 21 || $m == 31 || $m == 41 || $m == 51) {
        $result .= 'а';
    } else if ($m > 1 && $m < 5 || $m > 21 && $m < 25 || $m > 31 && $m < 35 || $m > 41 && $m < 45 || $m > 51 && $m < 55) {
        $result .= 'ы';
    }
    return $result;
}
?>
<p><?= getRusTime(); ?></p>
<?php
for ($h = 0; $h < 24; $h++) {
    for ($m = 0; $m < 60; $m++) {
        echo "<p>" . getRusTime($h, $m) . "</p>";
    }
}
?>
</body>
</html>