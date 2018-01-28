<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 27.01.2018
 * Time: 15:45
 */

spl_autoload_register(function ($class_name) {
    require_once 'engine/' . $class_name . '.php';
});

use classes\Image;
use db\DB;

if (isset($_POST['gallery_upload'])) {
    $image = Image::upload('gallery_img');
    if ($image) {
        $image->addToDB();
    }
}

$images = Image::getImages();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lesson 4 by Nik</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
<div class="main-container">
    <h2>Nik's Gallery</h2>
    <hr>
    <div class="gallery">
        <?php
        if ($images) {
            foreach ($images as $id => $img) {
                echo "<a target='_blank' href='img.php?id=$id'><img src='images/small/{$img->getFileName()}' title='views: {$img->getViews()}'></a>";
            }
        }
        ?>
    </div>
    <hr>
    <h2>Upload new image</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="gallery_img" required="required">
        <button name="gallery_upload" type="submit">Upload</button>
    </form>
</div>
</body>
</html>
<?php
    DB::closeConnection();
?>
