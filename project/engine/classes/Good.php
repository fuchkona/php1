<?php
/**
 * Created by PhpStorm.
 * User: fuchkona
 * Date: 06.02.2018
 * Time: 14:14
 */

namespace engine\classes;


class Good
{

    private $g_id;
    private $title;
    private $description;

    public function __construct($id = null)
    {
        $this->g_id = $id;
        $this->load();
    }

    public function load()
    {
        if (!is_null($this->g_id) && is_numeric($this->g_id)) {
            if ($row = DB::getRow("SELECT * FROM `goods` WHERE `g_id` = " . DB::esc($this->g_id))) {
                $this->title = $row['title'];
                $this->description = $row['description'];
            } else {
                $this->g_id = null;
            }
        }
    }

    public function save()
    {
        if (!is_null($this->g_id) && is_numeric($this->g_id)) {
            DB::update("UPDATE `goods` SET `title` = '" . DB::esc($this->title) . "', `description` = '" . DB::esc($this->description) . "' WHERE `g_id` = " . DB::esc($this->g_id));
        } else {
            $this->g_id = DB::insert("INSERT INTO `goods`(`title`, `description`) VALUES ('" . DB::esc($this->title) . "', '" . DB::esc($this->description) . "');");
        }
    }

    public function delete() {
        DB::delete("DELETE FROM `goods` WHERE `g_id` = " . DB::esc($this->g_id));
    }

    public static function getAll()
    {
        $goods = [];
        foreach (DB::getRows("SELECT * FROM `goods`;") as $db_good) {
            $good = new Good($db_good['g_id']);
            $good->setTitle($db_good['title']);
            $good->setDescription($db_good['description']);
            $goods[] = $good;
        }
        return $goods;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->g_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->g_id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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