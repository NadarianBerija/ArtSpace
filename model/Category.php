<?php
class Category{
    public static function getAllCategory() {
        $lang = getLang();

        $query = "SELECT c.id, cl.name FROM category c JOIN category_lang cl ON cl.cat_id = c.id WHERE cl.lang = '$lang' ORDER BY c.id";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}
?>