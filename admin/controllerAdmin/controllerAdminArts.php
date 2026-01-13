<?php
class controllerAdminArts{
    public static function ArtsList() {
        $arr = modelAdminArts::getArtsList();
        include_once 'viewAdmin/artsList.php';
    }

    // add
    public static function artAddForm() {
        $arr = modelAdminCategory::getCategoryList();
        include_once('viewAdmin/artAddForm.php');
    }

    public static function artAddResult() {
        $test = modelAdminArts::getArtAdd();
        include_once('viewAdmin/artAddForm.php');
    }

    //edit
    public static function artEditForm($id) {
        $arr = modelAdminCategory::getCategoryList();
        $detail = modelAdminArts::getArtDetail($id);
        include_once('viewAdmin/artEditForm.php');
    }

    public static function artEditResult($id) {
        $test = modelAdminArts::getArtEdit($id);
        include_once('viewAdmin/artEditForm.php');
    }

    //delete
    public static function artDeleteForm($id) {
        $arr = modelAdminCategory::getCategoryList();
        $detail = modelAdminArts::getArtDetail($id);
        include_once('viewAdmin/artDeleteForm.php');
    }

    public static function artDeleteResult($id) {
        $test = modelAdminArts::getArtDelete($id);
        include_once('viewAdmin/artDeleteForm.php');
    }
}
?>