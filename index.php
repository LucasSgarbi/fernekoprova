<?php 
    include './conexao.php';
    $ok = 0;
    session_start();
    
?>


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
<body style="background-color: #c0c0c0;">
    <div class="container-fluid">
        <?php         
        ?>
        <form action="./resultado.php" method="post">
            <?php
            $query = "select * from questoes order by rand() limit 15";
            $resultado = mysqli_query($conexao, $query);
            $i = 0;
            $result = [];
            $ids = [];
            while($linha = mysqli_fetch_array($resultado)){
                ?>

                    <div class="card col-md-6 offset-md-3 col-sm-12">
                        <div class="card-header">
                            <h2> <?php echo $i + 1 . ')->' .$linha["pergunta"]; ?> </h2>
                        </div>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" required name="resposta<?php echo $i ?>" value="A" /> &nbsp; A)- <?php echo $linha["a"]; ?> </li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" required name="resposta<?php echo $i ?>" value="B" /> &nbsp; B)- <?php echo $linha["b"]; ?></li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" required name="resposta<?php echo $i ?>" value="C" /> &nbsp; C)- <?php echo $linha["c"]; ?></li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" required name="resposta<?php echo $i ?>" value="D" /> &nbsp; D)- <?php echo $linha["d"]; ?></li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" required name="resposta<?php echo $i ?>" value="E" /> &nbsp; E)- <?php echo $linha["e"]; ?></li>
                            <?php $ids[$i] = $linha['id'] ?>    
                        </ul>
                    </div>
                <br>
                    
                <?php

                $i = $i+1;
            }
        ?>
        <?php 
        $_SESSION['ids']=$ids;
        // Foi usado seção para passar o Ids por conta que tão dando Shutdown no banco e as vezes não tem 15 questões
        ?>
        
        <div class="col-md-4 offset-md-4 col-sm-12">
            <button class="btn btn-dark btn-lg btn-block" type="submit">Salvar Resposta</button>
        </div>

        </form>
    </div>   
</body>
</html>