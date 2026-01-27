<?php
ob_start();
?>
<h1>
    <?=  $n['name'] ?>
</h1>
<br>

<?php

if (count($arr) > 0) {
    echo '<div class="artsContainer">';
    ViewArts::ArtsByCategory($arr);
    echo '</div>';
} else {
    echo "<p style='text-align: center'>" . __('nothing') . "</p>";
}
?>

<?php
$content = ob_get_clean();
include_once 'view/layout.php';