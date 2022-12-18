<?php
session_start();
require_once("../../PAGES_all/connection_FILE.php");

if(empty($_POST['matricula'])){
    header("Location: ../registration/REGISTER_page_ALUNO.php");
    exit();
}

$matricula = $_POST['matricula'];
$nome = $_POST['nome'];

$query = "SELECT count(matricula) as all_n FROM aluno WHERE matricula = $matricula";
$result = mysqli_query($bd, $query);
$row = mysqli_num_rows($result);

if($row['all_n'] == 1){
    $_SESSION['matricula_existe'] = true;
    header("Location: ../registration/REGISTER_page_ALUNO.php");
    exit();
}

$sql = "INSERT INTO aluno(nome_aluno, matricula) VALUES ('$nome', $matricula)";

if($bd->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$bd->close();

echo "<script>alert('CADASTRADO');</script>";
echo "<script>location.href='../../../index.php';</script>";
exit;
?>