<?php
ob_start();
?>
<h1><?= __('about_us') ?></h1>

<p><?= __('info_text') ?></p>

<hr>
<p><b><?= __('phone') ?>: </b>+372 5555 5555</p>
<p><b>Email: </b>info@artspace.ee</p>
<?php
$content = ob_get_clean();
include_once 'view/layout.php';
?>