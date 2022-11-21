<?php include './conexao.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <title>Estudo</title>
</head>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Estudos</a>
    <a class="navbar-brand" href="./index.php" >Home</a>
  </div>
</nav>
<body>
    <div class="container-fluid">
        <?php
        $query = "select * from questoes order by rand() limit 15";
        $resultado = mysqli_query($conexao, $query);
        $i = 0;
        $result = [];
        while($linha = mysqli_fetch_array($resultado)){
            ?>
                <div style="width:100%; border:1px solid;">
                    <h1> <?php echo $linha["pergunta"]; ?> </h1>
                    <h3> <?php echo $linha["a"]; ?> </h3>
                    <h3> <?php echo $linha["b"]; ?> </h3>
                    <h3> <?php echo $linha["c"]; ?> </h3>
                    <h3> <?php echo $linha["d"]; ?> </h3>
                    <h3> <?php echo $linha["e"]; ?> </h3>
                    <?php $result[$i] = $linha['correta'] ?>
                </div>
            <?php
            $i = $i+1;
        }
    ?>
        <pre>
            <?php
            print_r($result); 
            ?>
        </pre>
    </div>   
</body>
</html>