<?php
class ViewComments{
    public static function CommentsForm(){
        echo '<form action="insertcomment">
        <input type="hidden" name="id" value="'.$_GET['id'].'">'
           . __('your_comment') . ': <input type="text" name="comment">
        <input class="submitBtn" type="submit" value="'. __('send') . '"> </form>';
    }

    public static function CommentsByArt($arr) {
        if($arr!=null) {
            echo '<table id="ctable"><th class=commentTitle>' . __('comments') .  '</th><th class=dateTitle>' . __('date') .  '</th>';
            foreach($arr as $value) {
                echo '<tr><td class="comment">'.$value['text'].'</td><td class="date">'.$value['date'].'</td></tr>';
            }
            echo '</table>';
        }
    }

    public static function CommentsCountWithAncor($value) {
        if ($value['count']>0) {
            echo '<b><a href="#ctable"/> ('.$value['count'].') </a></b>';
        }
    }

    public static function CommentsCount($value) {
        if ($value['count']>0) {
            echo '<b><font color="red">('.$value['count'].') </font></b>';
        }
    }
}