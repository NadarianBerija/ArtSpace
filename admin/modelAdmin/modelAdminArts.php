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
            if(!empty($_POST['title_eng']) && !empty($_POST['text_eng']) && !empty($_POST['title_est']) && !empty($_POST['text_est']) &&!empty($_POST['idCategory'])) {

            $titleEng = $_POST['title_eng'];
            $textEng = $_POST['text_eng'];
            $titleEst = $_POST['title_est'];
            $textEst = $_POST['text_est'];
            $idCategory = $_POST['idCategory'];

            $image = addslashes (file_get_contents($_FILES['picture']['tmp_name']));

            $sql = "INSERT INTO `arts` (`id`, `title`, `text`, `picture`, `category_id`, `user_id`) VALUES (NULL, '$titleEng', '$textEng', '$image', '$idCategory', '1')";
            $db = new Database();
            $item = $db->executeRun($sql);

            if($item) {
                $artId = $db->lastInsertId();

                $sqlEng = "INSERT INTO arts_lang (art_id, lang, title, text) VALUES ('$artId', 'eng', '$titleEng', '$textEng')";
                $db->executeRun($sqlEng);

                $sqlEst = "INSERT INTO arts_lang (art_id, lang, title, text) VALUES ('$artId', 'est', '$titleEst', '$textEst')";
                $db->executeRun($sqlEst);

                $test = true;
                }
            }
        }

        return $test;
    }

    // art detail id
    public static function getArtDetail($id) {
        $lang = getLang();
        $query = "SELECT arts.*, category.name,users.username from arts, category,users WHERE arts.category_id=category.id AND arts.user_id=users.id and arts.id=".$id;
        $db = new Database();

        if ($lang === 'eng') {
            $query = "
                SELECT arts.*, category.name AS category_name, users.username
                FROM arts
                JOIN category ON arts.category_id = category.id
                JOIN users    ON arts.user_id = users.id
                WHERE arts.id = ".(int)$id."
            ";
            $arr = $db->getOne($query);
        } else {
        
            $query = "
                SELECT al.title, al.text, arts.picture, category.name AS category_name, users.username
                FROM arts
                JOIN category ON arts.category_id = category.id
                JOIN users    ON arts.user_id = users.id
                LEFT JOIN arts_lang al ON al.art_id = arts.id AND al.lang = '$lang'
                WHERE arts.id = ".(int)$id."
            ";
            $arr = $db->getOne($query);

            if (!$arr['title'] || !$arr['text']) {
            $fallback = $db->getOne("
                SELECT title, text
                FROM arts_lang
                WHERE art_id = ".(int)$id." AND lang = 'eng'
            ");
            $arr['title'] = $fallback['title'];
            $arr['text']  = $fallback['text'];
        }
        }

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