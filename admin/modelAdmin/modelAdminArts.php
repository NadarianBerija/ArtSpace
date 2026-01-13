<?php
class modelAdminArts{
    public static function getArtsList() {
        $query = "SELECT arts.*, category.name,users.username from arts, category,users WHERE arts.category_id=category.id AND arts.user_id=users.id ORDER BY `arts`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    //add
    public static function getArtAdd() {
        $test=false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])) {
                $title = $_POST['title'];
                $text = $_POST['text'];
                $idCategory = $_POST['idCategory'];

                $image = addslashes (file_get_contents($_FILES['picture']['tmp_name']));

                $sql = "INSERT INTO `arts` (`id`, `title`, `text`, `picture`, `category_id`, `user_id`) VALUES (NULL, '$title', '$text', '$image', '$idCategory', '1')";
                $db = new Database();
                $item = $db->executeRun($sql);
                if($item == true) {
                    $test = true;
                }
            }
        }
        return $test;    
    }

    // art detail id
    public static function getArtDetail($id) {
        $query = "SELECT arts.*, category.name,users.username from arts, category,users WHERE arts.category_id=category.id AND arts.user_id=users.id and arts.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }

    // art edit
    public static function getArtEdit($id) {
        $test=false;
        if(isset($_POST['save'])) {
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory'])) {
                $title = $_POST['title'];
                $text = $_POST['text'];
                $idCategory = $_POST['idCategory'];

                $image = $_FILES['picture']['name'];
                if($image != "") {
                    $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                }

                if($image="") {
                    $sql = "UPDATE `arts` SET `title` = '$title', 'text' = '$text', `category_id` = '$idCategory' WHERE `arts`.`id` = ".$id;
                } else {
                    $sql = "UPDATE `arts` SET `title` = '$title', `text` = '$text', `picture` = '$image', `category_id` = '$idCategory' WHERE `arts`.`id` = ".$id;
                }
                $db = new Database();
                $item = $db->executeRun($sql);
                if($item == true) {
                    $test = true;
                }
            }
        }
        return $test;
    }

    // art delete
    public static function getArtDelete($id) {
        $test = false;
        if(isset($_POST['save'])) {
            $sql = "DELETE FROM `arts` WHERE `arts`.`id` = ".$id;
            $db = new Database();
            $item = $db->executeRun($sql);
            if($item == true) {
                $test = true;
            }
        }
        return $test;
    }
}

?>