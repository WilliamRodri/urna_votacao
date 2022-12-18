<?php
session_start();
if(!$_SESSION['matricula'] && !$_SESSION['id_aluno']) {
    header("Location: ../../index.php");
    exit();
}

?>