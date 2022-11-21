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
    <title>Resultado</title>
</head>
<body>
    
</body>
</html>