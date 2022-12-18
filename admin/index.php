<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM | LOGIN | <?php echo "20" . date('y'); ?></title>
    <link rel="shortcut icon" href="../assets/img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
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
    </style>
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <a href="../index.php" class="btn btn-outline-dark">INICIO</a>
        <div class="row col-md-6 offset-md-3">
            <form class="form1" action="login_ADMIN/request.php" method="POST" style="padding: 10px;">

                <h1 style="@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap'); font-family: 'Roboto', sans-serif; margin-left: 10px;">LOGIN DE ADM</h1>

                <div class="form-group" style="padding: 10px;">
                    <label for="user">User: </label>
                    <input class="form-control inputL" type="text" placeholder="Digite o Username" name="user">
                </div>

                <div class="form-group" style="padding: 10px;">
                    <label for="user">Password: </label>
                    <input class="form-control inputL" type="password" placeholder="Digite o seu Password" name="pass">
                </div>

                <button type="submit" class="btn btn-success" style="margin-left: 10px; margin-top: 10px;">Acessar</button>
            </form>

                    <hr>        
            
                <form action="login_ADMIN/login_viaID.php" method="POST" class="row g-2" style="margin-left: 8px;">
                    <div class="col-auto">
                        <input type="text" class="form-control inputI" style="width: ;" name="id_admin" placeholder="Acesse pelo seu ID">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-dark" name="id_acess">Acessar</button>
                    </div>
                    <small class="d-flex justify-content-start" style="margin-left: 2px;">somente pessoas autorizadas</small>
                </form>
        </div>
        
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>