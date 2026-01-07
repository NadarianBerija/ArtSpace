<?php
ob_start();
?>

<br>

<?php
ViewArts::WatchArt($n);

echo "<br>";
Controller::Comments($_GET['id']);

echo "<br>";
ViewComments::CommentsForm();

$content = ob_get_clean();
include_once 'view/layout.php';
?>