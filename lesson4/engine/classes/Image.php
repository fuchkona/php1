<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 27.01.2018
 * Time: 16:16
 */

namespace classes;

use lib\ImageResize;

class Image
{
    private static $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];

    public static function getImages()
    {
        $files = scandir('images/small/');
        $images = [];
        foreach ($files as $file) {
            if (in_array(end(explode(".", $file)), self::$allowed_extensions)) {
                $images[] = $file;
            }
        }
        return count($images) ? $images : null;
    }

    public static function upload($name)
    {
        if ($file = $_FILES[$name]) {
            $extension = end(explode(".", $file['name']));

            if (in_array($extension, self::$allowed_extensions)) {
                $file_size = filesize($file['tmp_name']);
                if ($file_size && $file_size <= 3145728) {
                    $destination = time() . "_" . md5($file['name']) . ".$extension";
                    if (move_uploaded_file($file['tmp_name'], "images/big/" . $destination)) {
                        $resized = new ImageResize("images/big/" . $destination);
                        $resized->resizeToLongSide(200);
                        $resized->save("images/small/" . $destination);
                    } else {
                        throw new NikImageException("Upload error");
                    }
                } else {
                    throw new NikImageException("The file size must'n be empty or bigger then 3MB");
                }
            } else {
                throw new NikImageException("The file type must be " . join(' or ', $allowed_extensions));
            }
        }

    }

}