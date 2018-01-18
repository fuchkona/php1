<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 3 by Nik</title>
</head>
<body>
<h2>Task 1</h2>
<?php
$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) {
        echo "$i ";
    }
    $i++;
}
?>
<hr>
<h2>Task 2</h2>
<?php
$i = 0;
do {
    $line = "$i - ";
    if ($i == 0) {
        $line .= "это ноль";
    } elseif ($i % 2 == 0) {
        $line .= "четное число";
    } else {
        $line .= "нечетное число";
    }
    $i++;
    $line .= "<br>";
    echo $line;
} while ($i <= 10);
?>
<hr>
<h2>Task 3</h2>
<?php
$russia_cities = [];
$f = fopen("goroda.csv", "r");
while (!feof($f)) {
    $l = explode(';', fgets($f));
    if (!key_exists($l[0], $russia_cities)) {
        $russia_cities[$l[0]] = [];
    }
    array_push($russia_cities[$l[0]], $l[1]);
}
fclose($f);
//foreach ($russia_cities as $district => $cities) {
//    echo "<b>$district:</b><br>- " . implode(', ', $cities) . "<br>";
//}
?>
<hr>
<h2>Task 4</h2>
<?php
$letters = array(
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '#',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

    'А' => 'A', 'Б' => 'B', 'В' => 'V',
    'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
    'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
    'И' => 'I', 'Й' => 'Y', 'К' => 'K',
    'Л' => 'L', 'М' => 'M', 'Н' => 'N',
    'О' => 'O', 'П' => 'P', 'Р' => 'R',
    'С' => 'S', 'Т' => 'T', 'У' => 'U',
    'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
    'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
    'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '#',
    'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
);
function rus_to_lat($line)
{
    global $letters;
    return strtr($line, $letters);
}

//foreach ($russia_cities as $district => $cities) {
//    echo "<b>" . rus_to_lat($district) . ":</b><br>- " . rus_to_lat(implode(', ', $cities)) . "<br>";
//}
?>
<hr>
<h2>Task 5</h2>
<?php
function space_to_underline($line)
{
    return trim(preg_replace('/\s/', '_', $line), '-');
}

//foreach ($russia_cities as $district => $cities) {
//    echo "<b>" . space_to_underline($district) . ":</b><br>--" . space_to_underline(implode(', ', $cities)) . "<br>";
//}
?>
<hr>
<h2>Task 6</h2>
<a href="task6/index.php" target="_blank">TASK 6 solution</a>
<hr>
<h2>Task 7</h2>
<?php
for ($i = 0; $i < 10; print($i++)) {
};
?>
<hr>
<h2>Task 8</h2>
<?php
function get_cities_starts_with_letter($cities_array, $letter)
{
    foreach ($cities_array as $district => $cities) {
        $cities_line = [];
        foreach ($cities as $city) {
            if (substr($city, 0, 2) == strtolower($letter)) {
                array_push($cities_line, $city);
            }
        }
        if (count($cities_line)) {
            echo "<b>$district:</b><br>- " . implode(', ', $cities_line) . "<br>";
        }
    }
}

get_cities_starts_with_letter($russia_cities, 'К');
?>
<hr>
<h2>Task 9</h2>
</body>
</html>