<?php
require_once("../PAGES_all/verification_SESSION_FILE.php");
require_once("../PAGES_all/connection_FILE.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Dashboard | Aluno</title>
</head>
<body>
    <div class="container">
        <div class="row col-md-6 offset-md-3">
           <?php
          
          if(isset($_SESSION['id_passagem'])){

               $id = $_SESSION['id_passagem'];

               $sql = "SELECT * FROM aluno WHERE id_aluno = $id";
               $query = mysqli_query($bd, $sql);

               if(mysqli_num_rows($query) > 0){
                   foreach($query as $alunoID){
                       ?>
            <div class="row g-3">
            <div class="col-auto">
                <h1 style="font-size:37px; color:green;">Olá <strong><?php echo ucfirst($_SESSION['matricula']); ?></strong> oque deseja fazer?</h1>
            </div>
            <div class="col-auto">
                <a href="../vote/votacao_PANEL.php?id_user=<?= $alunoID['id_aluno'] ?>" class="btn btn-success">Realizar Votação</a>
            </div>
            <div class="col-auto">
                <a href="../panels/result.php" class="btn btn-secondary">Ver resultados</a>
            </div>
            <div class="col-auto">
                <a href="../PAGES_all/logout_account_FILE.php" name="sair" class="btn btn-danger">Sair da conta</a>
            </div>
            </div>
                       <?php
                   }
               }
          }
            
           ?>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</html>