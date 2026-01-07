<?php
class Controller {
    public static function StartSite() {
        $arr = Arts::getLast3Arts();
        include_once 'view/start.php';
    }

    public static function AllCategory() {
        $arr = Category::getAllCategory();
        include_once 'view/category.php';
    }

    public static function AllArts() {
        $arr = Arts::getAllArts();
        include_once 'view/allnews.php';
    }

    public static function ArtsByCatID($id) {
        $arr = Arts::getArtsByCategoryID($id);
        include_once 'view/catnews.php';
    }

    public static function NewsByID($id) {
        $n = Arts::getArtByid($id);
        include_once 'view/readnews.php';
    }

    public static function error404() {
        include_once 'view/error404.php';
    }

}
?>