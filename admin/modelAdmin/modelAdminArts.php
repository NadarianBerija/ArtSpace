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
        $db = new Database();

        $query = "
            SELECT 
                arts.id,
                arts.picture,
                arts.category_id,
                category.name AS category_name,
                users.username,

                eng.title AS title_eng,
                eng.text  AS text_eng,

                est.title AS title_est,
                est.text  AS text_est

            FROM arts
            JOIN category ON arts.category_id = category.id
            JOIN users    ON arts.user_id = users.id

            LEFT JOIN arts_lang eng 
                ON eng.art_id = arts.id AND eng.lang = 'eng'

            LEFT JOIN arts_lang est 
                ON est.art_id = arts.id AND est.lang = 'est'

            WHERE arts.id = ".(int)$id."
        ";

        $arr = $db->getOne($query);

        // fallback если нет перевода EST
        if (empty($arr['title_est'])) {
            $arr['title_est'] = $arr['title_eng'];
            $arr['text_est']  = $arr['text_eng'];
        }

        return $arr;
    }

    // art edit
    public static function getArtEdit($id) {
        $test=false;
        if(isset($_POST['save'])) {
            if(!empty($_POST['title_eng']) && !empty($_POST['text_eng']) && !empty($_POST['title_est']) && !empty($_POST['text_est']) && !empty($_POST['idCategory'])) {
                $titleEng = $_POST['title_eng'];
                $textEng = $_POST['text_eng'];
                $titleEst = $_POST['title_est'];
                $textEst = $_POST['text_est'];
                $idCategory = $_POST['idCategory'];

                if (!empty($_FILES['picture']['tmp_name'])) {
                $image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
                $sql = "
                    UPDATE arts 
                    SET title='$titleEng', text='$textEng', picture='$image', category_id='$idCategory'
                    WHERE id=".(int)$id;
            } else {
                $sql = "
                    UPDATE arts 
                    SET title='$titleEng', text='$textEng', category_id='$idCategory'
                    WHERE id=".(int)$id;
            }

            $db = new Database();
            $item = $db->executeRun($sql);

            if ($item) {
                
                $db->executeRun("
                    UPDATE arts_lang 
                    SET title='$titleEng', text='$textEng'
                    WHERE art_id=".(int)$id." AND lang='eng'
                ");

                $db->executeRun("
                    UPDATE arts_lang 
                    SET title='$titleEst', text='$textEst'
                    WHERE art_id=".(int)$id." AND lang='est'
                ");

                $test = true;
            }
        }
    }
    return $test;
}

    // art delete
    public static function getArtDelete($id) {
        $test = false;
        if (isset($_POST['save'])) {
        $db = new Database();

        $db->executeRun("
            DELETE FROM arts_lang 
            WHERE art_id=".(int)$id
        );

        $item = $db->executeRun("
            DELETE FROM arts 
            WHERE id=".(int)$id
        );

        if ($item) {
            $test = true;
        }
    }
    return $test;
    }
}

?>