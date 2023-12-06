<?php
session_start();
$IDparaaula = $_GET['CODIGO'];

include_once('conexao.php');

// Verificando se a variável de sessão está definida
if(isset($_SESSION['presenca_registrada']) && $_SESSION['presenca_registrada'] === true) {
    // Exibindo a mensagem de aula criada
   $mensagem = "Preseça Realizada Com Sucesso ! ";
    // Removendo a variável de sessão
    unset($_SESSION['presenca_registrada']);
} else {
    // Se a variável de sessão não estiver definida ou for falsa, redireciona de volta para a página inicial ou de erro
   $mensagem = "";
}


$aula = "SELECT ID, Aula, Dia, Horario, Observacoes FROM treinos WHERE ID = '$IDparaaula'";
$executar = mysqli_query($conexao, $aula);

$linha = mysqli_fetch_array($executar);
$MOD1= $_GET['MOD1'];
$MOD2= $_GET['MOD2'];
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

           .mensagem-box{
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .table {
            background-color:   #ffff;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .info-section {
            margin-right: 20em;
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

.edit-link a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.edit-link a:hover {
    background-color: #0056b3;
}


        .container {
            margin-right: 11em;
            float: right;
            width: 60%;
            padding: 30px;
        }

        p {
            text-align: left;
            font-size: 18px;
            margin-bottom: 20px;
        }



        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }


    </style>
</head>

<body>
<div class="mensagem-box" id="mensagem"><?php echo $mensagem; ?></div>

<script>
// Exibe a mensagem temporária ao carregar a página
window.onload = function() {
  var mensagemDiv = document.getElementById("mensagem");
  mensagemDiv.style.display = "block";

  // Esconde a mensagem após alguns segundos (por exemplo, 5 segundos)
  setTimeout(function() {
    mensagemDiv.style.display = "none";
  }, 3000); // Altere o valor aqui para ajustar o tempo de exibição
};
</script>


<div id="sidebar">
    <div id="logo">
        <img src="../TCC/img/logo.jpeg" alt="logo">
        <h1>Atleta Frequente</h1>
    </div>
    <ul>
    <li><a href="telainicial.php?MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>">Página Inicial</a></li>
        <li><a href="TELAMARCAR.php?MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>">Criar Aula</a></li>
        <li><a href="AULAS.php?MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>">Histórico de Aulas</a></li>
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
            <div class="edit-link">
        <a href='chamada.php?chamada=<?php echo $IDparaaula;?>& MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>'>Editar chamada</a>
    </div>
    </div>
    
</div>
<div>
    <table class="table table-hover table-borderless">
            <thead class="thead-light">
            <tr>
                <th>Nome do Aluno</th>
                <th>Presença</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once('conexao.php');

            $consulta_alunos = "SELECT ID, NOME FROM tela_cadastro";
            $resultado_alunos = mysqli_query($conexao, $consulta_alunos);

            if ($resultado_alunos) {
                while ($row = mysqli_fetch_array($resultado_alunos)) {
                    $aluno_id = $row['ID'];
                    $nome_aluno = $row['NOME'];

                    $consulta_presenca = "SELECT Presenca FROM chamada WHERE aula_id = '$IDparaaula' AND aluno_id = '$aluno_id'";
                    $resultado_presenca = mysqli_query($conexao, $consulta_presenca);

                    if ($resultado_presenca && $presenca_row = mysqli_fetch_array($resultado_presenca)) {
                        $presente = $presenca_row['Presenca'];

                        $status_presenca = $presente ? 'Presente' : 'Ausente';

                        echo "<tr>";
                        echo "<td>" . $nome_aluno . "</td>";
                        echo "<td>" . $status_presenca . "</td>";
                        echo "</tr>";
                    }
                }
            } else {
                echo "Erro na consulta: " . mysqli_error($conexao);
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
