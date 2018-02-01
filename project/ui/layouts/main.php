<?php
use engine\classes\Router;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nik's market</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/main_new.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/nouislider.min.css">
    <link rel="shortcut icon" href="/images/logo.png" type="image/png">
    <script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="/js/nouislider.min.js" type="text/javascript"></script>
</head>
<body>
<div class="wrapper">
    <?php require_once __DIR__ . '/main/header.php'?>
    <?php require_once __DIR__ . '/main/top_navigation.php'?>
    <!-- Content -->
    <div>
        <?php require_once __DIR__ . '/../pages/' . Router::getCurrentPage() . '.php'; ?>
    </div>
    <?php require_once __DIR__ . '/main/subscribe.php'?>
    <?php require_once __DIR__ . '/main/bottom_navigation.php'?>
    <?php require_once __DIR__ . '/main/footer.php'?>
</div>
<?php require_once __DIR__ . '/main/browse_categories.php' ?>
<?php require_once __DIR__ . '/main/main_cart.php' ?>
<script src="/js/main.js" type="text/javascript"></script>
<script src="/js/classes/Container.js" type="text/javascript"></script>
<script src="/js/classes/Cart.js" type="text/javascript"></script>
</body>

</html>