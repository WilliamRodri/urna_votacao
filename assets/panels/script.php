<?php

require_once('../PAGES_all/connection_FILE.php');

@$check = $_POST['btn_focus'];

$file = fopen("key.txt", "r+");

if($check == null){
    $sql = "UPDATE page_result SET status = 0";
    $s = str_replace('0', '0', '0');
    fwrite($file, "$s");
    $query = mysqli_query($bd, $sql);
    header('Location: dashboard_perfil_adm.php');
    fclose($file);
}else{
    $sql = "UPDATE page_result SET status = 1";
    $s = str_replace('1', '1', '1');
    fwrite($file, "$s");
    $query = mysqli_query($bd, $sql);
    header('Location: dashboard_perfil_adm.php');
    fclose($file);
}

?>
