<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIE SUA CHAPA | <?php echo "20" . date('y'); ?></title>
    <link rel="shortcut icon" href="../img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="script.js"></script>
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
            <form action="config_chapa.php" method="POST">
            <button type="button" class="btn btn-outline-success" onclick="voltar()">VOLTAR</button>
                <h1 style="@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap'); font-size:25px; font-family: 'Roboto', sans-serif; margin-left: 10px;">CADASTRAR CHAPA</h1>

                <div class="row g-3">
                    <div class="col-auto">
                        <label for="matricula">Nome da Chapa: </label>
                        <input type="text" class="form-control matricula inputL"  name="nome_chapa" placeholder="Nome da Chapa" required>
                    </div>

                    <div class="col-auto">
                        <label for="matricula">Número da Chapa: </label>
                        <input type="number" class="form-control matricula inputL" name="numero" placeholder="Digite o número da chapa",
                        maxlength="2" minlength="2" onkeypress='return filtroTeclas(event)' required>
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-success" >Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>