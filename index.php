<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Votação | <?php echo "20" . date('y'); ?></title>
    <style>
        .matricula::placeholder{
            color: green;
        }
        .matricula:focus{
            box-shadow: none;
            border: 1px solid green;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 80px; color: green;">
        <div class="row col-md-6 offset-md-3">
            <form action="assets/php/login/LOGIN_confi_ALUNO.php" method="POST" class="row g-2">
                
                    <h1 style="@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap'); font-family: 'Roboto', sans-serif; margin-left: 10px;">ACESSE SEU PERFIL (aluno)</h1>

                    <div class="col-auto" style="width: 371px;">
                        <input type="text" class="form-control matricula" style="width: ;" name="matricula" placeholder="Informe sua Matricula">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success" name="id_acess">Acessar</button>
                    </div>

            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>
