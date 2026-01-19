<?php
class Arts{
    public static function getLast3Arts() {
        $lang = getLang();

        $query = "SELECT a.id, atran.title, atran.text, a.picture FROM arts a JOIN art_translations atran ON atran.art_id = a.id WHERE atran.lang = '$lang' ORDER BY a.id DESC LIMIT 3";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllArts() {
        $lang = getLang();

        $query = "SELECT a.id, atran.title, atran.text, a.picture FROM arts a JOIN art_translations atran ON atran.art_id = a.id WHERE atran.lang = '$lang' ORDER BY a.id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getArtsByCategoryID($id) {
        $lang = getLang();

        $query = "SELECT a.id, atran.title, atran.text, a.picture FROM arts a JOIN art_translations atran ON atran.art_id = a.id WHERE a.category_id=".(int)$id." AND atran.lang = '$lang' ORDER BY a.id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getArtByid($id) {
        $lang = getLang();

        $query = "SELECT a.id, atran.title, atran.text, a.picture FROM arts a JOIN art_translations atran ON atran.art_id = a.id WHERE a.id=".(int)$id." AND atran.lang = '$lang' LIMIT 1";
        $db = new Database();
        $n = $db->getOne($query);
        return $n;
    }
}
?>