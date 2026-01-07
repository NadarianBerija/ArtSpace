<?php
ob_start();
?>
<h1>Arts (category)</h1>
<br>
<div class="artsContainer">
<?php
ViewArts::ArtsByCategory($arr);
$content = ob_get_clean();
include_once 'view/layout.php';
?>
</div>