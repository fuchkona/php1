<h3>Welcome <?= \engine\classes\App::getUser()->getLogin(); ?></h3>
<form method="post">
    <button class="btn btn-red btn-block" name="logout" type="submit">Logout</button>
</form>
