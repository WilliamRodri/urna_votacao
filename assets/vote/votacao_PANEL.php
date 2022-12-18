<?php
require "../PAGES_all/verification_SESSION_FILE.php";
require "../PAGES_all/connection_FILE.php";

if(isset($_GET['id_user'])){
    
    $auth_votos = $_GET['id_user'];


    $sql_auth = "SELECT * FROM aluno WHERE id_aluno = $auth_votos";
    $query_auth = mysqli_query($bd, $sql_auth);
    $row = mysqli_fetch_assoc($query_auth);

    if($row['auth_votos'] == 0){
        header("Location: votacao_PANEL.php");
        exit();
    }else{
        echo "<script>alert('VOCÊ JÁ VOTO, NÃO E POSSIVEL VOTAR NOVAMENTE')</script>";
        echo "<script>location.href='../panels/dashboard_perfil_aluno.php'</script>";
        exit();
    }
    
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>REALIZAR VOTAÇÃO | <?php echo "20" . date('y'); ?></title>

    <style>
        .matricula::placeholder{
            color: green;
        }
        .matricula:focus{
            box-shadow: none;
            border: 1px solid green;
            color: green;
        }
        .chapas{
            margin-top: 25px;
        }
        #chapasTables{
            display: none;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 80px; color: green;">
        <div class="row col-md-6 offset-md-3"> 
            <form action="system_votacao.php" method="POST" class="row g-3"> 
                <h1>REALIZE O SEU VOTO <strong>VOTAÇÃO <?php echo "20" . date('y'); ?></strong></h1>
                    <div class="col-auto">
                        <input class="form-control matricula" maxLength="2" minLength="2" type="text" placeholder='2 Digitos para voto' name="voto" id="voto" onkeypress='return filtroTeclas(event)'>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success" onclick="mostrarValor()">VOTAR</button>
                    </div>
         </form>
                    <div class="form-group" style="margin-top:20px;">
                        <button class="btn btn-success" id="btnchapaexis">Ver Chapas Concorrentes</button>
                    </div>
        </div>

            <div class="row chapas" id="chapasTables">
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Nome:</td>
                            <td>Número</td>
                        </tr>
                    </thead>
                    <?php
                        $sql = "SELECT * FROM chapa";
                        $query = mysqli_query($bd, $sql);

                        if(mysqli_num_rows($query)>0){
                            foreach($query as $chapa){
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?= ucfirst($chapa['nome_chapa']) ?></td>
                                        <td><?= ucfirst($chapa['num_chapa']) ?></td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                        }else{
                            echo "No momento não existe chapa existente.";
                        }
                    ?>
                </table>
            </div>
    </div>
</body>
<script>
        const  button = document.getElementById("btnchapaexis");
        button.addEventListener("click", function(){
            var container = document.getElementById("chapasTables");

                if(container.style.display === "block"){
                    container.style.display = "none";
                }else{
                    container.style.display = "block";
                }
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</html>