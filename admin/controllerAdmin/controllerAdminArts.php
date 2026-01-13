<?php
class controllerAdminArts{
    public static function ArtsList() {
        $arr = modelAdminArts::getArtsList();
        include_once 'viewAdmin/artsList.php';
    }
}
?>