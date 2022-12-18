<?php
session_start() or die('A sessão não pode ser iniciada');
require_once("../PAGES_all/connection_FILE.php");



$sql = "SELECT status FROM page_result";
$query = mysqli_query($bd, $sql);
$array = mysqli_fetch_array($query);

if($_SESSION['matricula']){

    if($array['status'] == 0){
        header("Location: indisponivel.php");
    }

}else{
    
    if($array['status'] == 0){
    }

}

//if(!isset($_SESSION['admin'])){
  //  header("Location: result.php");
//}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img_ALL/eeep-marvin-logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULTADO | VOTAÇÃO <?php echo "20" . date('y'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: red;
            transition: 1s;
        }

        * {
            padding: 5px;
        }

        h1 {
            color: green;
            font-family: 'Roboto', sans-serif;
        }

        h2 {
            font-size: 25px;
            color: #1F6B17;
        }

        .title td {
            color: green;
            font-weight: bold;
        }

        .toggle-wrapper {
  display: flex;
  align-items: center;
}

/* Texto que decidi adicionar como exemplo */
.toggle-wrapper .description {
  margin-left: 1.5rem;
  font-weight: bold;
  letter-spacing: 0.2rem;
  font-size: 1.4rem;
}

/* Esconde o checkbox */
.switch > .hidden-toggle {
  display: none;
}

/* Caixinha onde o botão desliza */
.switch > .slider {
  background: #44C154;
  border: 0.1rem solid #bbb;
  cursor: pointer;
  border-radius: 3rem;
  transition: all 300ms ease-in-out;
  width: 4.8rem;
  height: 2.3rem;
  position: relative;
  box-shadow: inset -0.5rem 0.5rem 0.5rem rgba(0, 0, 0, 0.2),
    0 0 1rem rgba(0, 0, 0, 0.1);
}

/* O botão redondinho */
.switch > .slider > .button {
  content: "";
  position: absolute;
  width: 1.2rem;
  height: 1.2rem;
  background: white;
  top: 0.4rem;
  left: 0.4rem;
  transition: all 300ms ease-in-out;
  border-radius: 50%;
  z-index: 2;
  box-shadow: inset -0.5rem 0.5rem 0.5rem rgba(0, 0, 0, 0.2);
}

/* Texto ON ou OFF (começa off) */
.switch > .slider:after {
  position: absolute;
  top: 50%;
  right: 1rem;
  transform: translate(0, -50%);
  font-size: 1rem;
  line-height: 1rem;
  color: white;
  font-weight: bold;
  z-index: 1;
  transition: all 300ms ease-in-out;
  content: "OFF";
}

/* Slider ON */
.switch > .hidden-toggle:checked ~ .slider {
  background: white;
  box-shadow: inset 0.5rem 0.5rem 0.5rem rgba(0, 0, 0, 0.2),
    0 0 1rem rgba(50, 0, 150, 0.2);
}

/* Botão ON */
.switch > .hidden-toggle:checked ~ .slider > .button {
  left: 2.2rem;
  box-shadow: inset 0.5rem 0.5rem 0.5rem rgba(0, 0, 0, 0.2);
  background: #44C154
}

/* Texto ON */
.switch > .hidden-toggle:checked ~ .slider:after {
  right: 2.6rem;
  color: #44C154;
  content: "ON";
}

    </style>
    <script>
        function voltar() {
            window.history.back()
        }
    </script>
</head>

<body>
        <div class="container">
            <button type="button" class="btn btn-outline-success" onclick="voltar()">VOLTAR</button>
            <form action="result_config.php" method="POST">
                <div class="row">
                    <h1>ULTIMAS ATUALIZAÇÕES DA VOTAÇÃO <strong><?php echo "20" . date('y'); ?></strong> </h1>
                    <h2>APURAÇÃO</h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="title">
                                <td>NOME: </td>
                                <td>NUMERO: </td>
                                <td>TOTAL DE VOTOS: </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $sql = "SELECT * FROM chapa ORDER BY votos DESC";
                                    $query = mysqli_query($bd, $sql);

                                    if(mysqli_num_rows($query)>0){
                                        foreach($query as $result){
                                            ?>
                            <tr>
                                <td><?= ucfirst($result['nome_chapa']) ?></td>
                                <td><?= $result['num_chapa'] ?></td>
                                <td><?= $result['votos'] ?></td>
                            </tr>
                            <?php
                                    }
                                }else{
                                    echo "<h1>AINDA NAO TEMOS RESULTADOS</h1>";
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
            <a href="" onclick="imprimir()">🖨️</a>
        </div>
        <?php
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>

<script>

let active = false;

const btn = document.querySelector('#active');

btn.addEventListener('click', e =>{

    e.preventDefault();
    active = true;
    console.log(active);
    
    if(active){
        location.href="result.php";
    }else{
        location.href="indisponivel.php";
    }

})
    function imprimir() {
        window.print();
    }
</script>