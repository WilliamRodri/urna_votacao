<?php
$_SESSION['logged_out'] = true;
require_once("../../assets/PAGES_all/connection_FILE.php");

if(empty($_POST['id_admin'])){
    header("Location: ../index.php");
    exit();
}

$ID_admin = $_POST['id_admin'];

$sql = "SELECT * FROM admin_user WHERE admin_id_login = $ID_admin";
$query = mysqli_query($bd, $sql);
$row = mysqli_fetch_array($query);

if($ID_admin == $row['admin_id_login']){
        session_start();
        $id = $row;
        $_SESSION['admin'] = $id['admin_id_login'];
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