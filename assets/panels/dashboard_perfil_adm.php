<?php
session_start() or die('A sessão não pode ser iniciada');
require_once("../PAGES_all/connection_FILE.php");

if(!isset($_SESSION['admin'])){
    header("Location: dashboard_perfil_adm.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <title>Dashboard | ADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    .toggle {
        margin-bottom: 20px;
    }
    .toggle > input {
    display: none;
}

.toggle > label {
    position: relative;
    display: block;
    height: 28px;
    width: 52px;
    background-color: #f7f7f7;
    border: 1px #a2e3e6 solid;
    border-radius: 100px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.toggle > label:after {
    position: absolute;
    left: 1px;
    top: 1px;
    display: block;
    width: 26px;
    height: 26px;
    border-radius: 100px;
    background: #fff;
    box-shadow: 0px 3px 3px rgba(0,0,0,0.05);
    content: '';
    transition: all 0.3s ease;
}
.toggle > label:active:after {
    transform: scale(1.15, 0.85);
}
.toggle > input:checked ~ label {
    background-color: #4cda64;
    border-color: #4cda64;
}
.toggle > input:checked ~ label:after {
    left: 25px;
}
.toggle > input:disabled ~ label {
    background-color: #d5d5d5;
    pointer-events: none;
}
.toggle > input:disabled ~ label:after {
    background-color: rgba(255, 255, 255, 0.3);
}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">

            <!-- Texto Principal -->
            <div class="row g-4">
                <div class="col-auto">
                    <h1>Olá <strong><?php echo ucfirst($_SESSION['name']); ?></strong></h1>
                    <h5><strong>Bem vindo ao Painel de Administração</strong></h5>
                </div>
            </div>

            <hr>
            <div class="div"></div>

            <form action="script.php" method="POST">
                <h5>Liberar Resultados?</h5>
                <div class="toggle">
                    <input type="checkbox" id="foo" name="btn_focus">
                    <label for="foo"></label>
                    <p id="estado">desligado</p>
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

            <?php
                if(isset($_SESSION['id_admin'])){

                    $id = $_SESSION['id_admin'];
                    $sql = "SELECT * FROM admin_user WHERE id_admin = $id";
                    $query = mysqli_query($bd, $sql);

                    if(mysqli_num_rows($query)>0){
                        foreach($query as $admin){
                            ?>

            <!-- Editar Perfil -->
            <div class="row g-4">
                <div class="col-auto">
                    <a href="../../admin/assets/edit_account.php?id=<?= $admin['id_admin'] ?>" class="btn btn-primary">Editar meu perfil</a>
                </div>
            </div>

             <!-- Editar Perfil de Alunos -->
            <div class="row g-1" style="margin-left: 7px;">
                <div class="col-auto">
                    <a href="../../admin/assets/edit_alunos.php" class="btn btn-primary">Editar perfil de Alunos</a>
                </div>
            </div>

             <!-- Editar Chapas -->
            <div class="row g-1" style="margin-left: 7px;">
                <div class="col-auto">
                    <a href="../../admin/assets/edit_chapas.php" class="btn btn-primary">Editar Chapas</a>
                </div>
            </div>

             <!-- Editar Chapas -->
            <div class="row g-1" style="margin-left: 7px;">
                <div class="col-auto">
                    <a href="result.php" class="btn btn-success">Ver Resultados</a>
                </div>
            </div>

            <!-- Editar Chapas -->
            <div class="row g-1" style="margin-left: 7px;">
                <div class="col-auto">
                    <a href="../../admin/logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
                            <?php
                        }
                    }else{
                    echo "<h3><strong>PROBLEMA NO SERVIDOR</strong></h3>";
                    }
                }
            ?>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>

<script>

let onoff = document.getElementById('foo');
let estado = document.getElementById('estado');
let div =  document.querySelector('.div');

var arquivo = 'key.txt';
var xhr = new XMLHttpRequest();

xhr.responseType = 'text';
xhr.open('GET', arquivo, true);
xhr.addEventListener('readystatechange', function () {

    if (xhr.readyState === 4 && xhr.status === 200) {
    
        if(xhr.responseText == 1){
            onoff.checked = true
        }

        if(xhr.responseText == 0){
            onoff.checked = false
        }
        
        if(xhr.responseText == '' || xhr.responseText >= 2){
            console.error('ERROR')
        }

    }
}, false);
xhr.send();

onoff.addEventListener('change', function() {

    estado.innerHTML = this.checked ? 'Ativado' : 'Desativado';

});

</script>