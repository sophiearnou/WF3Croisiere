<?php

$title = 'WF3 Croisière - Administration';

ob_start(); ?>
<h1>Administration</h1>
<?php require 'menu.php'; ?>
<?php $content = ob_get_clean();
 require '../template.php'; ?>