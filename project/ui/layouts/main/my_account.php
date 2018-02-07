<?php
use engine\classes\User;

if (isset($_POST['authorisation'])) {
    $guest = new User();
    $guest->load($_POST['login']);
    if ($guest->getId() && $guest->verifyPass($_POST['pass'])) {
        echo "OK!";
    } else {
        echo "WRONG";
    }
}
?>
<div id="my-account-panel" class="my-account-panel">
    <form method="post">
        <div class="text-title">Login</div>
        <input class="text-input" type="text" maxlength="150" required="required" name="login"/>
        <div class="text-title">Password</div>
        <input class="text-input" type="text" maxlength="64" required="required" name="pass"/>
        <button class="btn btn-red btn-block" name="authorisation" type="submit">Authorisation</button>
    </form>
    <a href="/registration" class="btn btn-red btn-block">Registration</a>
</div>