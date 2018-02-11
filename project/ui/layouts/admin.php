<?php
use engine\classes\Router;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<body>
<div class="wrapper">
    <!-- Content -->
    <div>
        <?php
        if (Router::getCurrentPage()) {
            require_once Router::getFullPathToCurrentPage();
        } else {
            ?>
            <h2>Sorry! Page not found!</h2>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>