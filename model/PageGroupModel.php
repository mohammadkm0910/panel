<?php


namespace Model;


class PageGroupModel extends Database
{
    public function all()
    {
        $db = new Database();
        return $db->select("SELECT * FROM `page_groups` ORDER BY `id` DESC ;")->fetchAll();
    }
    public function byId($id)
    {
        $db = new Database();
        return $db->select("SELECT * FROM `page_groups` WHERE `id`= ? ;",[$id])->fetch();
    }
    public function parentPageGroup()
    {
        $db = new Database();
        return $db->select("SELECT * FROM `page_groups` WHERE `parent_id` IS NULL ORDER BY `id` DESC; ")->fetchAll();
    }
    public function childPageGroup($isDesc = true)
    {
        $db = new Database();
        $desc = $isDesc ? "DESC" : "ASC";
        return $db->select("SELECT * FROM `page_groups` WHERE `parent_id` IS NOT NULL ORDER BY `id` $desc; ")->fetchAll();
    }
    public function countParentGroup()
    {
        $db = new Database();
        return $db->select("SELECT * FROM `page_groups` WHERE `parent_id` IS NULL ORDER BY `id` DESC; ")->rowCount();
    }
    public function countPageGroup()
    {
        $db = new Database();
        return $db->select("SELECT * FROM `page_groups` ORDER BY `id` DESC ; ")->rowCount();
    }
    public function titleParentById($id)
    {
        $db = new Database();
        $title = $db->select("SELECT `title` FROM `page_groups` WHERE `id`= ? ;",[$id])->fetch();
        return $title ? $title['title'] : "گروه اصلی";
    }
}