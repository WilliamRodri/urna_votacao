<?php
session_start();
session_destroy();
$_SESSION['inlogged'] = false;
header("Location:index.php");
exit();
?>