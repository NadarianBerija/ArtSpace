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
        include_once 'view/allarts.php';
    }

    public static function ArtsByCatID($id) {
        $arr = Arts::getArtsByCategoryID($id);
        include_once 'view/catarts.php';
    }

    public static function ArtsByID($id) {
        $n = Arts::getArtByid($id);
        include_once 'view/watchart.php';
    }

    public static function error404() {
        include_once 'view/error404.php';
    }

    public static function InsertComment($c, $id) {
        Comments::InsertComment($c, $id);
        header('Location:arts?id='.$id.'#ctable');
    }

    public static function Comments($artid) {
        $arr = Comments::getCommentByArtID($artid);
        ViewComments::CommentsByArt($arr);
    }

    public static function CommentsCount($artid) {
        $arr = Comments::getCommentsCountByArtID($artid);
        ViewComments::CommentsCount($arr);
    }

    public static function CommentsCountWithAncor($artid) {
        $arr = Comments::getCommentsCountByArtID($artid);
        ViewComments::CommentsCountWithAncor($arr);
    }

    public static function registerForm() {
        include_once('view/formRegister.php');
    }
    
    public static function registerUser() {
        $result = Register::registerUser();
        include_once('view/answerRegister.php');
    }
}
?>