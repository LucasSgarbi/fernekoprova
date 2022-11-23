<?php
session_start();
include './conexao.php';
$ids = [];
$ids = $_SESSION['ids'];
$result = [];
$result = $_SESSION['resultados'];
$pontuacao = count($ids);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <title>Resultado</title>
</head>

<body style="background-color: #c0c0c0;">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Estudos</a>
            <a class="navbar-brand" href="./index.php">Home</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 col-sm-12 bg-success fw-bold"> <h4>Resposta Corretas estão em verde</h4></div>
            <div class="col-md-3 col-sm-12 bg-danger fw-bold"> <h4>Resposta Eradas estão em vermelho</h4></div>
            <div class="col-md-3"></div>
        </div>
        <br>
        <?php
        $i = 0;
        for ($i; $i < count($ids); $i++) {
            $query = "select * from questoes WHERE ID =" . $ids[$i];
            $resultado = mysqli_query($conexao, $query);
            $linha = mysqli_fetch_array($resultado)
        ?>
            <div class="card col-md-6 offset-md-3 col-sm-12">
                <div class="card-header">
                    <h2> <?php echo $i + 1 . ')->' . $linha["pergunta"]; ?> </h2>
                </div>
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item <?php if ($result[$i] == 'A' || $result[$i] == 'a') {
                                                    echo 'bg-success';
                                                } elseif ($_POST['resposta' . $i] == 'A' || $_POST['resposta' . $i] == 'a') {
                                                    echo 'bg-danger';
                                                    $pontuacao = $pontuacao - 1;
                                                } ?>"> &nbsp; A)- <?php echo $linha["a"]; ?> </li>
                    <li class="list-group-item <?php if ($result[$i] == 'B' || $result[$i] == 'b') {
                                                    echo 'bg-success';
                                                } elseif ($_POST['resposta' . $i] == 'B' || $_POST['resposta' . $i] == 'b') {
                                                    echo 'bg-danger';
                                                    $pontuacao = $pontuacao - 1;
                                                } ?>"> &nbsp; B)- <?php echo $linha["b"]; ?></li>
                    <li class="list-group-item <?php if ($result[$i] == 'C' || $result[$i] == 'c') {
                                                    echo 'bg-success';
                                                } elseif ($_POST['resposta' . $i] == 'C' || $_POST['resposta' . $i] == 'c') {
                                                    echo 'bg-danger';
                                                    $pontuacao = $pontuacao - 1;
                                                } ?>">&nbsp; C)- <?php echo $linha["c"]; ?></li>
                    <li class="list-group-item <?php if ($result[$i] == 'D' || $result[$i] == 'd') {
                                                    echo 'bg-success';
                                                } elseif ($_POST['resposta' . $i] == 'D' || $_POST['resposta' . $i] == 'd') {
                                                    echo 'bg-danger';
                                                    $pontuacao = $pontuacao - 1;
                                                } ?>">&nbsp; D)- <?php echo $linha["d"]; ?></li>
                    <li class="list-group-item <?php if ($result[$i] == 'E' || $result[$i] == 'e') {
                                                    echo 'bg-success';
                                                } elseif ($_POST['resposta' . $i] == 'E' || $_POST['resposta' . $i] == 'e') {
                                                    echo 'bg-danger';
                                                    $pontuacao = $pontuacao - 1;
                                                } ?>">&nbsp; E)- <?php echo $linha["e"]; ?></li>
                </ul>
            </div>
            <br>
        <?php
        }

        ?>
        <?php
        echo ' <div class="row">
                    <div class="col-sm-12 col-md-6 offset-md-4"> <h1 class="text-primary">Sua pontuação é de ' .$pontuacao. '</h1></div>
                </div>';
        // echo '<script> alert("Sua pontuação é de ' . $pontuacao . '")</script>';
        ?>

    </div>
</body>

</html>