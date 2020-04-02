<?php

$title = 'Modifier une destination';

ob_start();
?>
<h1><?=$title; ?></h1>
<?php
$content = ob_get_clean();

require_once '../template.php';
?>
