<?php
class Category{
    public static function getAllCategory() {
        $lang = getLang();

        $query = "SELECT c.id, cl.name FROM category c JOIN category_lang cl ON cl.cat_id = c.id WHERE cl.lang = '$lang' ORDER BY c.id";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getCategoryById($id) {
        $lang = getLang();

        $query = "SELECT c.id, cl.name FROM category c JOIN category_lang cl ON cl.cat_id = c.id WHERE c.id = '$id' AND cl.lang = '$lang' LIMIT 1";
        $db = new Database();
        $n = $db->getOne($query);
        return $n;
    }
}
?>