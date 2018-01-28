<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 28.01.2018
 * Time: 17:00
 */

spl_autoload_register(function ($class_name) {
    require_once 'engine/' . $class_name . '.php';
});

use classes\Image;

if (!isset($_GET['id'])) {
    die("Missing id");
}
$img = new Image();
$img->setId($_GET['id']);
$img->load();
$img->incViews();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMG <?= $img->getId() ?></title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
<div class="main-container">
    <h2>Nik's Gallery</h2>
    <hr>
    <img class="single-img" src="images/big/<?= $img->getFileName() ?>" alt="">
    <h2>Views: <?= $img->getViews() ?></h2>
</div>
</body>
</html>