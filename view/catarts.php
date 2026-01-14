<?php
ob_start();
?>
<h1><?= __('arts_categories') ?></h1>
<br>
<div class="artsContainer">
<?php
ViewArts::ArtsByCategory($arr);
$content = ob_get_clean();
include_once 'view/layout.php';
?>
</div>