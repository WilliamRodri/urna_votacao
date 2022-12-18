<?php
session_start() or die('A sessão não pode ser iniciada');
require_once("../connection_FILE.php");

if(!isset($_SESSION['admin'])){
    header("Location: edit_alunos_config.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR ALUNO</title>
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
        <form action="edit_alunos_config.php" method="post">
            <button type="button" class="btn btn-outline-success" onclick="voltar()">VOLTAR</button>
                <?php
                if(isset($_GET['id_aluno'])){

                    $id_aluno = $_GET['id_aluno'];
                    $sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";
                    $query = mysqli_query($bd, $sql);

                    if(mysqli_num_rows($query)>0){
                        foreach($query as $alunoU){
                            ?>

                            <h1 style="@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap'); font-size:25px; font-family: 'Roboto', sans-serif; margin-left: 10px;">EDITANDO O PERFIL DE <?= strtoupper($alunoU['nome_aluno']); ?></h1>


                            <div class="form-group">
                                <label for="nome">Nome: </label>
                                <input type="text" class="form-control matricula inputL" value="<?= $alunoU['nome_aluno']; ?>" name="nome">
                            </div>

                            <div class="form-group">
                                <label for="matricula">Matricula: </label>
                                <input type="text" class="form-control matricula inputL" value="<?= $alunoU['matricula']; ?>" name="matricula">
                            </div>
                            
                            <?php
                        }
                    }

                }else{
                    echo "<h1>NAO ENCONTRAMOS O PERFIL</h1>";
                }
                ?>
                
                <div class="col-auto">
                    <button type="submit" name="update" class="btn btn-success btn-sm">Atualizar</button>
                </div>
        </div>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>

<?php

if(isset($_POST['update'])){
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];

    $sql = "UPDATE aluno 
            SET
            nome_aluno = '$nome',
            matricula = $matricula
            ";
    $query = mysqli_query($bd, $sql);

    if($query){
        echo "<script>alert('ATUALIZAÇÃO REALIZADA')</script>";
        echo "<script>location.href='../panels/dashboard_perfil_adm.php';</script>";
        exit(0);
    }else{
        echo "<script>alert('ERROR ATUALIZAÇÃO REALIZADA')</script>";
        echo "<script>location.href='edit_account.php';</script>";
        exit(0);
    }
}

?>