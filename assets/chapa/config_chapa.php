<?php

require_once("../PAGES_all/connection_FILE.php");

if(empty($_POST['nome_chapa']) && empty($_POST['numero'])){
    header("Location: chapa_page_PANEL.php");
    exit();
}

$chapa = $_POST['nome_chapa'];
$num = $_POST['numero'];

$sql = "SELECT num_chapa FROM chapa WHERE num_chapa = $num";
$query_sql = mysqli_query($bd, $sql);
$row = mysqli_fetch_assoc($query_sql);

if($row){
    echo "<script>alert('JA EXISTE UMA CHAPA CADASTRADA COM ESSES DADOS');</script>";
    echo "<script>location.href='config_chapa.php';</script>";
}else{
    $sql_insert = "INSERT INTO chapa(nome_chapa, num_chapa) VALUES('$chapa', $num)";
    $query_insert = mysqli_query($bd, $sql_insert);
    echo "<script>alert('CHAPA CADASTRADA COM SUCESSO');</script>";
echo "<script>location.href='../../index.php';</script>";
}
?>