<?php
session_start() or die("ERROR NA SESSÃO");
require_once("../PAGES_all/connection_FILE.php");

if(empty($_POST['voto'])){
    header("Location: votacao_PANEL.php");
    exit();
}


$voto = $_POST['voto'];

echo $voto;

$sql = "SELECT num_chapa FROM chapa WHERE num_chapa = $voto";
$query = mysqli_query($bd, $sql);
$val = mysqli_num_rows($query);

$authID = $_SESSION['id_passagem'];

echo $authID;


if($val == 1){

    $votos_qtd = "SELECT votos FROM chapa WHERE num_chapa = $voto";
    $query_VOTOS = mysqli_query($bd, $votos_qtd);
    $VALUE_votos = mysqli_fetch_assoc($query_VOTOS);
    $chapa_votos = implode($VALUE_votos);

    //echo "esse e a quantidade de votos = " . implode($VALUE_votos) . "= da chapa " . $voto;
    
    if($chapa_votos == 0){

        $new_val = 1;
        $sql_val = "UPDATE chapa SET votos = $new_val WHERE num_chapa = $voto";
        $query = mysqli_query($bd, $sql_val);
        $sql_auth = "UPDATE aluno SET auth_votos = 1 WHERE id_aluno = $authID";
        $query_auth = mysqli_query($bd, $sql_auth);
        echo "<script>alert('VOTO REALIZADO, PARABÉNS')</script>";
        echo "<script>location.href='../panels/dashboard_perfil_aluno.php';</script>";
        exit();
        
    }else{

        $new_val_up = $chapa_votos + 1;
        $sql_val_up = "UPDATE chapa SET votos = $new_val_up WHERE num_chapa = $voto";
        $query = mysqli_query($bd, $sql_val_up);
        $sql_auth = "UPDATE aluno SET auth_votos = 1 WHERE id_aluno = $authID";
        $query_auth = mysqli_query($bd, $sql_auth);
        echo "<script>alert('VOTO REALIZADO, PARABÉNS')</script>";
        echo "<script>location.href='../panels/dashboard_perfil_aluno.php';</script>";
        exit();

    }
}else{

    echo "<script>alert('Chapa não existe, tente novamente')</script>";
    echo "<script>location.href='votacao_PANEL.php';</script>";
    exit();

}
?>