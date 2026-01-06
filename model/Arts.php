<?php
class Arts{
    public static function getLast3Arts() {
        $query = "SELECT * FROM arts ORDER BY id DESC LIMIT 3";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllArts() {
        $query = "SELECT * FROM arts ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getArtsByCategoryID($id) {
        $query = "SELECT * FROM arts where category_id=".(string)$id." ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getArtByid($id) {
        $query = "SELECT * FROM arts where id=".(string)$id;
        $db = new Database();
        $n = $db->getOne($query);
        return $n;
    }
}
?>