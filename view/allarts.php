<?php
ob_start();
?>
<h1><?= __('all_arts') ?></h1>
<br>
<div class="artsContainer">
<?php
ViewArts::AllArts($arr);
$content = ob_get_clean();
include_once 'view/layout.php';
?>
</div>