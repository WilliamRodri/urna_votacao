<?php
$_SESSION['logged_out'] = true;
require_once("../../assets/PAGES_all/connection_FILE.php");

if(empty($_POST['user']) && empty($_POST['pass'])){
    header("Location: ../index.php");
    exit();
}

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql_pass = "SELECT * FROM admin_user WHERE password_admin = $pass";
$query_pass = mysqli_query($bd, $sql_pass);

$row = mysqli_fetch_array($query_pass);


if($user == $row['user_admin'] && $pass == $row['password_admin']){
        session_start();
        $id = $row;
        $_SESSION['admin'] = $id['password_admin'];
        $_SESSION['name'] = $id['user_admin'];
        $_SESSION['id_admin'] = $id['id_admin'];
        $_SESSION['matricula'] = null;
        echo "<script>alert('ACESSO CONCEDIDO')</script>";
        echo "<script>location.href = '../../assets/panels/dashboard_perfil_adm.php';</script>";
}else{
    $_SESSION['logged_out'] = true;
    echo "<script>alert('ACESSO NÃO CONCEDIDO')</script>";
    echo "<script>location.href = '../index.php'</script>";
}

?>