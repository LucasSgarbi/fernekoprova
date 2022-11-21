<?php 
    include './conexao.php';
    $ok = 0;
    $respos = [];
    if( isset ($_POST ) && !empty($_POST) ){
        for($j=0;$j<15;$j++){
            $respos[$j]= $_POST['resposta'.$j];
            if($respos[$j]==$result[$j])
            {
                $ok+=1;
            }
        }
    }
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
<body>
    <div class="container-fluid">
        <?php 
        if( isset ($_POST ) && !empty($_POST) ){
            echo ' Voce tem'.$ok.'respostas certas';
        }          

        ?>
        <form action="./index.php" method="post">
            <?php
            $query = "select * from questoes order by rand() limit 15";
            $resultado = mysqli_query($conexao, $query);
            $i = 0;
            $result = [];
            while($linha = mysqli_fetch_array($resultado)){
                ?>

                    <div class="card col-4 offset-4">
                        <div class="card-header">
                            <h1> <?php echo $linha["pergunta"]; ?> </h1>
                        </div>
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item"><input id="<?php echo $i ?>" type="radio" name="resposta<?php echo $i ?>" value="A" /> &nbsp; A)- <?php echo $linha["a"]; ?> </li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" name="resposta<?php echo $i ?>" value="B" /> &nbsp; B)- <?php echo $linha["b"]; ?></li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" name="resposta<?php echo $i ?>" value="C" />&nbsp; C)- <?php echo $linha["c"]; ?></li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" name="resposta<?php echo $i ?>" value="D" />&nbsp; D)- <?php echo $linha["d"]; ?></li>
                            <li class="list-group-item"><input id="<?php echo $i ?>"type="radio" name="resposta<?php echo $i ?>" value="E" />&nbsp; E)- <?php echo $linha["e"]; ?></li>
                            <?php $result[$i] = $linha['correta'] ?>
                            
                        </ul>
                    </div>

                    
                <?php
                $i = $i+1;
            }
        ?>
        <div class="col-4 offset-4">
            <button type="submit">Salvar Pergunta</button>
        </div>
        
            <pre>
                <?php
                print_r($result); 
                ?>
            </pre>
        </form>
    </div>   
</body>
</html>