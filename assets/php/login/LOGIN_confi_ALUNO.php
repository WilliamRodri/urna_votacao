<?php
session_start();
require_once("../../PAGES_all/connection_FILE.php");

if(empty($_POST['matricula'])){
    header("Location: ../../../index.php");
    exit();
}

$matricula = $_POST['matricula'];

$query = "SELECT * FROM aluno WHERE matricula = $matricula";
$result = mysqli_query($bd, $query);
$row = mysqli_num_rows($result);

if($row == 1){
    $matri_bd = mysqli_fetch_assoc($result);
    $_SESSION['id_passagem'] = $matri_bd['id_aluno'];
    $_SESSION['matricula'] = $matri_bd['nome_aluno'];
    $_SESSION['aluno_view_result'] = true;
    header("Location: ../../panels/dashboard_perfil_aluno.php?id=$matricula");
    exit();
}else{
    $_SESSION['inlogged'] = true;
    echo "<script>alert('ERROR NO ACESSO, VERIFIQUE SUAS INFORMAÇÕES');</script>";
    echo "<script>location.href='../../../index.php';</script>";
    exit();
}
?>