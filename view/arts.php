<?php
class ViewArts{
    public static function ArtsByCategory($arr) {
        if (!$arr) return;

        foreach($arr as $value) {
            echo '<div class="artsBox"><img src="data:image/jpeg;base64,'.base64_encode( $value['picture'] ).'" width=150 /><br>';
            echo "<h2>".$value['title']."</h2>";
            Controller::CommentsCount($value['id']);
            echo "<a href='art".langLink(getLang())."&id=".$value['id']."'>". __('more') ."</a><br></div>";
        }
    }

    public static function AllArts($arr) {
        if (!$arr) return;

        foreach($arr as $value) {
            echo '<div class="artsBox"><img src="data:image/jpeg;base64,'.base64_encode( $value['picture'] ).'" width=150 /><br>';
            echo "<h2>".$value['title']."</h2>";
            Controller::CommentsCount($value['id']);
            echo "<a href='art".langLink(getLang())."&id=".$value['id']."'>". __('more') ."</a><br></div>";
        }
    }

    public static function WatchArt($n) {
        if (!$n) {
            echo "<p>Публикация не найдена.</p>";
            return;
        }

        echo "<h2>".$n['title']."</h2>";
        Controller::CommentsCountWithAncor($n['id']);
        echo '<br><img class="watchArt" src="data:image/jpeg;base64,'.base64_encode( $n['picture'] ).'" width=150 /><br>';
        echo "<p>".$n['text']."</p>";
    }
}
?>