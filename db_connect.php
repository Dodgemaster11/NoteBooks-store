<?php

$db_host = 'localhost';
$db_user = 'admin';
$db_pass = 'm1661833412bh';
$db_database = 'db_shop';
$link = mysqli_connect($db_host, $db_user, $db_pass);

mysqli_select_db($link,$db_database) or die("Net soedineniya s Db".mysqli_error());

?>

