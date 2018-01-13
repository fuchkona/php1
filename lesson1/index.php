<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 1 by Nik</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
<?php
$a = 5;
$b = '05';
?>
<p>$a = 5;</p>
<p>$b = '05';</p>
<p>var_dump($a == $b); // Почему true?</p>
<?php var_dump($a == $b) ?>
- потому, что работает приведение типов. $b приводится к числу и сравнивается с числом $a,5=5
<p>var_dump((int)'012345'); // Почему 12345?</p>
<?php var_dump((int)'012345'); ?>
- потому, что мы используем явное преобразование и строка приводится к числу
<p>var_dump((float)123.0 === (int)123.0); // Почему false?</p>
<?php var_dump((float)123.0 === (int)123.0); ?>
- потому, что типы не совпадают, === сравнивает не только значение но итип.
<p>var_dump((int)0 === (int)'hello, world'); // Почему true?</p>
<?php var_dump((int)0 === (int)'hello, world'); ?>
- потому, что мы используем явное преобразование типа, а в строкесправа нет чисел и оно привелось к числу 0. 0=0
<hr>
<?php
echo 'a=' . ($a = rand(-1000, 1000)) . '<br/>';
echo 'b=' . ($b = rand(-1000, 1000)) . '<br/>';
echo '<br/>Меняем местами<br/>';
$a += $b;
$b -= $a;
$a += $b;
$b *= -1;
echo 'a=' . $a . '<br/>';
echo 'b=' . $b . '<br/>';
?>
<hr>
<a href="../project">To project</a>
</body>
</html>