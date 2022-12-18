<?php
session_start() or die('A sessão não pode ser iniciada');
require_once("../connection_FILE.php");

if(!isset($_SESSION['admin'])){
    header("Location: edit_alunos.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../../assets/img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR ALUNOS</title>
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
        .tables{
            margin: 20px;
            align-items: center;
            text-align: center;
        }
    </style>
        <script>
        function voltar() {
            window.history.back()
        }
    </script>
</head>
<body>

<div  class="container" style="margin-top: 80px; color: green;">
    <div class="row col-md-10 offset-md-1">
        <form>
            <button type="button" class="btn btn-outline-success" onclick="voltar()">VOLTAR</button>

            <h1 style="@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap'); font-size:25px; font-family: 'Roboto', sans-serif; margin-left: 10px;">PAINEL DE CHAPAS</h1>
        
            <div class="col-auto tables">
                <table class="table table-success table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <td><strong>ID:</strong></td>
                            <td><strong>NOME:</strong></td>
                            <td><strong>NÚMERO:</strong></td>
                            <td> </td>
                        </tr>
                    </thead>
                    <?php
                    $sql   =    "SELECT * FROM chapa";
                    $query =    mysqli_query($bd, $sql);
                    
                    if(mysqli_num_rows($query) > 0){
                        foreach($query as $chapas){
                            ?>
                            <tbody class="tbody-light">
                            <tr>
                                <td><?= $chapas['id_chapa'] ?></td>
                                <td><?= ucfirst($chapas['nome_chapa']) ?></td>
                                <td><?= $chapas['num_chapa'] ?></td>
                                <td>
                                <a href="edit_chapa_config.php?id=<?= $chapas['id_chapa'] ?>" class="btn btn-success btn-sm">Editar</a>
                                <form action="edit_chapas.php" method="POST" class="d-inline">
                                    <button type="submit" name="deletar" value="<?=$chapas['id_chapa'];?>" class="btn btn-danger btn-sm">Deletar</button>
                                </form>
                                </td>
                            </tr>
                            </tbody>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="col-auto">
                <a href="../../assets/chapa/chapa_page_PANEL.php" class="btn btn-warning">Criar Chapa</a>
            </div>
        </form>
    </div>
</div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>

<?php

if(isset($_POST['deletar'])){

    $id_chapa = mysqli_real_escape_string($bd, $_POST['deletar']);

    $sql_delete = "DELETE FROM chapa WHERE id_chapa = $id_chapa";
    $query_delete = mysqli_query($bd, $sql_delete);

    if($query_delete){
        echo "<script>alert('DELETADO COM SUCESSO')</script>";
        echo "<script>location.href='edit_chapas.php';</script>";
        exit(0);
    }else{
        echo "<script>alert('ERRO AO DELETAR')</script>";
        echo "<script>location.href='edit_chapas.php';</script>";
        exit(0);
    }
}

?>
