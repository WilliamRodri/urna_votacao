<?php
session_start() or die('A sessão não pode ser iniciada');
require_once("../connection_FILE.php");

if(!isset($_SESSION['admin'])){
    header("Location: edit_account.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../assets/img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR CONTA ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        h1{
            margin-bottom: 20px;
        }
        .form1{
            color: green;
        }
        .inputL{
            border: 1px solid green;
        }
        .inputL::placeholder{
            color: green;
        }
        .inputL:focus{
            box-shadow: none;
            border: 1px solid green;
            color: green;
        }
        .inputI{
            border: 1px solid black;
        }
        .inputI::placeholder{
            color: black;
        }
        .inputI:focus{
            box-shadow: none;
            border: 1px solid black;
            color: black;
        }

        .btn{
            margin-top: 15px;
            margin-bottom: 25px;
        }
        .checkbox-circle2 input[type="checkbox"] {
  display: none;
}
.checkbox-circle2 input[type="checkbox"] + label {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 20px;
  font: 14px/20px "Open Sans", Arial, sans-serif;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
}
.checkbox-circle2 input[type="checkbox"]:hover + label:hover {
  color: #366020;
}
.checkbox-circle2 input[type="checkbox"]:hover + label:before {
  border: 1px solid #343a3f;
  box-shadow: 2px 1px 0 #343a3f;
}
.checkbox-circle2 input[type="checkbox"] + label:last-child {
  margin-bottom: 0;
}
.checkbox-circle2 input[type="checkbox"] + label:before {
  content: "";
  display: block;
  width: 1.4em;
  height: 1.4em;
  border: 1px solid #343a3f;
  border-radius: 1em;
  position: absolute;
  left: 0;
  top: 0;
  -webkit-transition: all 0.2s, background 0.2s ease-in-out;
  transition: all 0.2s, background 0.2s ease-in-out;
  background: #f3f3f3;
  box-shadow: -2px -1px 0 #343a3f;
}
.checkbox-circle2 input[type="checkbox"]:checked + label:before {
  border-radius: 1em;
  border: 2px solid #fff;
  width: 1.15em;
  height: 1.15em;
  background: #50565a;
  box-shadow: 2px 1px 0 #50565a;
}
.item{
    margin-top: 15px;
}
    </style>
    <script>
        function voltar() {
            window.history.back()
        }
    </script>
</head>
<body>
<div class="container" style="margin-top: 80px; color: green;">
    <div class="row col-md-6 offset-md-3">
        <form action="edit_account.php" method="POST">
            <button type="button" class="btn btn-outline-success" onclick="voltar()">VOLTAR</button>
            <h1 style="@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap'); font-size:25px; font-family: 'Roboto', sans-serif; margin-left: 10px;">EDITANDO O PERFIL DO ADM <strong><?= strtoupper($_SESSION['name']) ?></strong></h1>

            <div>
                <?php
                    if(isset($_GET['id'])){
                        $admin_id = mysqli_real_escape_string($bd, $_GET['id']);
                        $query = "SELECT * FROM admin_user WHERE id_admin='$admin_id' ";
                        $query_run = mysqli_query($bd, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            $admin = mysqli_fetch_array($query_run);
                        ?>
                        <div class="form-group">
                            <label for="user">User: </label>
                            <input value="<?= $admin['user_admin'] ?>"  class="form-control matricula inputL"type="text" name="user">
                        </div>

                        <div class="form-group">
                            <label for="user">Password: </label>
                            <input id="password_input" value="<?= $admin['password_admin'] ?>" class="form-control matricula inputL" type="password" name="pass">
                            <div class="item">
                                <div class="checkbox-circle2">
                                    <input type="checkbox" id="checkbox-circle2" class="ver" name="check">
                                    <label for="checkbox-circle2">Ver senha</label>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    }
                ?>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-success" name="update">Atualizar</button>
            </div>
        </form>
    </div>
</div>
</body>
<script>
    var input = document.querySelector('#password_input');
        var btn = document.querySelector('.ver');
        btn.addEventListener('click', function () {
        input.type = input.type == 'text' ? 'password' : 'text';
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</html>
<?php

if(isset($_POST['update'])){

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "UPDATE admin_user 
            SET
            user_admin = '$user',
            password_admin = '$pass'
            ";
    $query = mysqli_query($bd, $sql);

    if($query){
        echo "<script>alert('ATUALIZAÇÃO REALIZADA')</script>";
        echo "<script>location.href='../../assets/panels/dashboard_perfil_adm.php';</script>";
        exit(0);
    }else{
        echo "<script>alert('ERROR ATUALIZAÇÃO REALIZADA')</script>";
        echo "<script>location.href='edit_account.php';</script>";
        exit(0);
    }
}
?>