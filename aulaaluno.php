<?php
$IDparaaula = $_GET['CODIGO'];
include_once('conexao.php');

$aula = "SELECT ID, Aula, Dia, Horario, Observacoes FROM treinos WHERE ID = '$IDparaaula'";
$executar = mysqli_query($conexao, $aula);

$linha = mysqli_fetch_array($executar);
$Matriculaparaperfil = $_GET['CODIGO1'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes da Aula</title>
    <link rel="stylesheet" type="text/css" href="tela_inicial.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .info-section {
            margin-right: 30em;
    background-color: #f5f5f5;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}

.info-section h2 {
    font-size: 26px;
    margin-bottom: 10px;
}

.info-section ul {
    list-style: none;
    padding: 0;
}

.info-section ul li {
    font-size: 16px;
    margin-bottom: 5px;
}


        .container {
            float: right;
            width: 60%;
            padding: 20px;
        }

    </style>
</head>

<body>
<div id="sidebar">
    <div id="logo">
        <img src="../TCC/img/logo.jpeg" alt="logo">
        <h1>Atleta Frequente</h1>
    </div>
    <ul>
        <li><a href="telaaluno.php?CODIGO=<?php echo "$Matriculaparaperfil";?>">Página Inicial</a></li>
        <li><a href="AULASaluno.php?CODIGO=<?php echo "$Matriculaparaperfil";?>">Histórico de Aulas</a></li>
    </ul>
    </div>

<div class="container mt-4">
    <div class="info-section">
        <h2>Informações da Aula</h2>
        <ul>
            <li><strong>Treino:</strong> <?php echo $linha[1]; ?></li>
            <li><strong>Data:</strong> <?php $data = date('d/m/Y', strtotime($linha[2])); echo $data; ?></li>
            <li><strong>Horário:</strong> <?php $hora = date('H:i', strtotime($linha[3])); echo $hora; ?></li>
            <li><strong>Observações:</strong> <?php echo $linha[4]; ?></li>
        </ul> 
            
    </div>
    
</div>

</div>
</body>
</html>