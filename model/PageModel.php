<?php


namespace Model;
use Model\Database;
use PDO;

class PageModel
{
    public function all($isGroupJoin = false)
    {
        $db = new Database();
        $db->select("SELECT * FROM `pages` ORDER BY `id` DESC ");
        if ($isGroupJoin)
            return $db->select("SELECT * FROM `pages` LEFT JOIN `page_groups` ON `pages`.`group_id` = `page_groups`.`id` ORDER BY `pages`.`id` ")->fetchAll(PDO::FETCH_NAMED);
        else
            return $db->select("SELECT * FROM `pages` ORDER BY `id` ")->fetchAll();
    }
    public function byId($id,$isGroupJoin = false)
    {
        $db = new Database();
        $db->select("SELECT * FROM `pages` ORDER BY `id` DESC ");
        if ($isGroupJoin)
            return $db->select("SELECT * FROM `pages` LEFT JOIN `page_groups` ON `pages`.`group_id` = `page_groups`.`id` WHERE `pages`.`id`= ?; ",[$id])->fetch(PDO::FETCH_NAMED);
        else
            return $db->select("SELECT * FROM `pages` WHERE `id`= ?; ",[$id])->fetch();
    }
}