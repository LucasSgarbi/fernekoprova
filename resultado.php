<?php 
    session_start();
    include './conexao.php';
    $ids = [];
    $ids = $_SESSION['ids'];
    $result = [];
    $result = $_SESSION['resultados'];
    $pontuacao = 0;
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
<body>
    <?php 
    $i=0;
    for($i;$i<count($ids);$i++){
        $query = "select * from questoes WHERE ID =".$ids[$i];
        $resultado = mysqli_query($conexao, $query);
        $linha = mysqli_fetch_array($resultado)
        ?>
        <div class="card col-md-4 offset-md-4 col-sm-12">
            <div class="card-header">
                <h1> <?php echo $linha["pergunta"]; ?> </h1>
            </div>
            <ul class="list-group list-group-flush ">
                <li class="list-group-item <?php if($result=='A'||$result=='a'){echo 'bg-success'; break;}elseif($_POST['resposta'.$i]=='A'||$_POST['resposta'.$i]=='a'){echo 'bg-danger';}?>"> &nbsp; A)- <?php echo $linha["a"]; ?> </li>
                <li class="list-group-item <?php if($result=='B'||$result=='b'){echo 'bg-success'; break;}elseif($_POST['resposta'.$i]=='B'||$_POST['resposta'.$i]=='b'){echo 'bg-danger';}?>"> &nbsp; B)- <?php echo $linha["b"]; ?></li>
                <li class="list-group-item <?php if($result=='C'||$result=='c'){echo 'bg-success'; break;}elseif($_POST['resposta'.$i]=='C'||$_POST['resposta'.$i]=='c'){echo 'bg-danger';}?>">&nbsp; C)- <?php echo $linha["c"]; ?></li>
                <li class="list-group-item <?php if($result=='D'||$result=='d'){echo 'bg-success'; break;}elseif($_POST['resposta'.$i]=='D'||$_POST['resposta'.$i]=='d'){echo 'bg-danger';}?>">&nbsp; D)- <?php echo $linha["d"]; ?></li>
                <li class="list-group-item <?php if($result=='E'||$result=='e'){echo 'bg-success'; break;}elseif($_POST['resposta'.$i]=='E'||$_POST['resposta'.$i]=='e' ){echo 'bg-danger';}?>">&nbsp; E)- <?php echo $linha["e"]; ?></li>
            </ul>
        </div>
        <?php
        if($result[$i]==$_POST['resposta'.$i]){
            $pontuacao = $pontuacao+1;
        }
    }
        
    ?>
    <?php
    echo 'Sua pontuação é'. $pontuacao;
    ?>

    
</body>
</html>