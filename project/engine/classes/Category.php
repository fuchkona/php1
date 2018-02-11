<?php
/**
 * Created by PhpStorm.
 * User: Nikita
 * Date: 11.02.2018
 * Time: 18:39
 */

namespace engine\classes;


class Category
{

    private $c_id;
    private $title;
    private $parent;

    public function __construct($id = null)
    {
        $this->c_id = $id;
        $this->load();
    }

    public function load($sql = null)
    {
        if (!$sql && !is_null($this->c_id) && is_numeric($this->c_id)) {
            $sql = "SELECT * FROM `categories` WHERE `c_id` = " . $this->c_id;
        }
        if ($row = DB::getRow($sql)) {
            $this->c_id = $row['c_id'];
            $this->title = $row['title'];
            $this->parent = $row['parent'];
        } else {
            return null;
        }
    }

    public function save() {
        if (!is_null($this->c_id) && is_numeric($this->c_id)) {
            DB::update("UPDATE `categories` SET `title` = '" . DB::esc($this->title) . "', `parent` = " . DB::esc($this->parent) . " WHERE `c_id` = " . DB::esc($this->c_id));
        } else {
            $this->c_id = DB::insert("INSERT INTO `categories`(`title`, `parent`) VALUES ('" . DB::esc($this->title) . "', " . DB::esc($this->parent) . ");");
        }
    }

    public function delete()
    {
        DB::delete("DELETE FROM `categories` WHERE `c_id` = " . DB::esc($this->c_id));
    }

    public function getChildren()
    {
        $categories = [];
        foreach (DB::getRows("SELECT * FROM `categories` WHERE `parent` = " . DB::esc($this->parent)) as $db_category) {
            $category = new Category($db_category['c_id']);
            $category->setTitle($db_category['title']);
            $category->setParent($db_category['parent']);
            $categories[] = $category;
        }
        return $categories;
    }

    /**
     * @return null
     */
    public function getCId()
    {
        return $this->c_id;
    }

    /**
     * @param null $c_id
     */
    public function setCId($c_id)
    {
        $this->c_id = $c_id;
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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

}