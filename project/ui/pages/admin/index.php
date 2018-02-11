<?php
use engine\classes\App;

$user = App::getUser();
?>
<div class="spaced-container">
    <h1>Welcome to admin panel <?= $user->getName(); ?></h1>
    <hr>
</div>