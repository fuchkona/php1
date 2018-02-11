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
    private $price;
    private $visits;

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
                $this->price = $row['price'];
                $this->visits = $row['visits'];
            } else {
                $this->g_id = null;
            }
        }
    }

    public function save()
    {
        if (!is_null($this->g_id) && is_numeric($this->g_id)) {
            DB::update("UPDATE `goods` SET `title` = '" . DB::esc($this->title) . "', `description` = '" . DB::esc($this->description) . "', `price` = " . DB::esc($this->price) . " WHERE `g_id` = " . DB::esc($this->g_id));
        } else {
            $this->g_id = DB::insert("INSERT INTO `goods`(`title`, `description`, `price`) VALUES ('" . DB::esc($this->title) . "', '" . DB::esc($this->description) . "', " . DB::esc($this->price) . ");");
        }
    }

    public function delete()
    {
        DB::delete("DELETE FROM `goods` WHERE `g_id` = " . DB::esc($this->g_id));
    }

    public static function getAll()
    {
        $goods = [];
        foreach (DB::getRows("SELECT * FROM `goods`;") as $db_good) {
            $good = new Good($db_good['g_id']);
            $good->setTitle($db_good['title']);
            $good->setDescription($db_good['description']);
            $good->setPrice($db_good['price']);
            $good->setVisits($db_good['visits']);
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

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * @param mixed $visits
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;
    }

    public function incVisits()
    {
        if ($this->g_id) {
            $this->visits++;
            $this->save();
        }
    }

}