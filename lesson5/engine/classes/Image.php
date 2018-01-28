<?php

/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 27.01.2018
 * Time: 16:16
 */

namespace classes;

use db\DB;
use lib\ImageResize;

class Image
{
    private static $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png'];
    private static $big_folder = "images/big/";
    private static $small_folder = "images/small/";

    private $id;
    private $name;
    private $size;
    private $file_name;
    private $views;
    private $description;

    /**
     * Image constructor.
     */
    public function __construct()
    {

    }


    public static function getImages()
    {
        $files = DB::execute("SELECT * FROM `gallery_images` ORDER BY `views` DESC");
        $images = [];
        foreach ($files as $file) {
            $img = new Image();
            $img->setId($file['i_id']);
            $img->load();
            $images[$img->getId()] = $img;
        }
        return count($images) ? $images : null;
    }

    /**
     * @param $name - $_FILES[$name]
     * @return Image|null
     * @throws NikImageException
     */
    public static function upload($name)
    {
        if ($file = $_FILES[$name]) {
            $extension = end(explode(".", $file['name']));
            self::checkDirs();
            if (in_array($extension, self::$allowed_extensions)) {
                $file_size = filesize($file['tmp_name']);
                if ($file_size && $file_size <= 3145728) {
                    $image_filename = time() . "_" . md5($file['name']) . ".$extension";
                    if (move_uploaded_file($file['tmp_name'], self::$big_folder . $image_filename)) {
                        $resized = new ImageResize(self::$big_folder . $image_filename);
                        $resized->resizeToLongSide(200);
                        $resized->save(self::$small_folder . $image_filename);
                        if (file_exists(self::$big_folder . $image_filename) && file_exists(self::$small_folder . $image_filename)) {
                            $img = new Image();
                            $img->setName($file['name']);
                            $img->setSize($file_size);
                            $img->setFileName($image_filename);
                            return $img;
                        }
                    } else {
                        throw new NikImageException("Upload error");
                    }
                } else {
                    throw new NikImageException("The file size must'n be empty or bigger then 3MB");
                }
            } else {
                throw new NikImageException("The file type must be " . join(' or ', self::$allowed_extensions));
            }
        }
        return null;
    }

    private static function checkDirs()
    {
        if (!is_dir(self::$big_folder)) {
            if (!mkdir(self::$big_folder, 0644, true)) {
                throw new NikImageException("Can'n create directory " . self::$big_folder);
            }
        }
        if (!is_dir(self::$small_folder)) {
            if (!mkdir(self::$small_folder, 0644, true)) {
                throw new NikImageException("Can'n create directory " . self::$small_folder);
            }
        }
    }

    public function addToDB()
    {
        $sql = "INSERT INTO `gallery_images`(`name`, `size`, `file_name`) VALUES (\"{$this->name}\", {$this->size}, \"{$this->file_name}\")";
        DB::insert($sql);
    }

    public function load()
    {
        if ($this->id) {
            $sql = "SELECT * FROM `gallery_images` WHERE `i_id` = {$this->id}";
            $result = DB::execute($sql)[0];
            $this->setName($result['name']);
            $this->setSize($result['size']);
            $this->setFileName($result['file_name']);
            $this->setViews($result['views']);
            $this->setDescription($result['description']);
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $file_name
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * @return mixed
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param mixed $views
     */
    private function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * Increase views count
     */
    public function incViews()
    {
        $this->views += 1;
        if ($this->id) {
            $sql = "UPDATE `gallery_images` SET `views`= {$this->views} WHERE `i_id`= {$this->id}";
            DB::insert($sql);
        }
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}