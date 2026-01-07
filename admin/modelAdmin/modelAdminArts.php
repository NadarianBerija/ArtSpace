<?php
class modelAdminArts{
    public static function getArtsList() {
        $query = "SELECT arts.*, category.name,users.username from arts, category,users WHERE arts.category_id=category.id AND arts.user_id=users.id ORDER BY `arts`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}

?>