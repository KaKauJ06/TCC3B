<?php
session_start(); // Inicia a sessão para acessar variáveis de sessão

// Verifica se há uma mensagem na variável de sessão
if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    // Remove a mensagem da variável de sessão para não exibi-la novamente
    unset($_SESSION['mensagem']);
} else {
    // Se não houver sucesso no cadastro, redireciona de volta para a página do formulário
    $mensagem = "";
}

$MOD1 = $_GET['MOD1'];
$MOD2 = $_GET['MOD2'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INICIO</title>
    <link rel="stylesheet" type="text/css" href="tela_inicial.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .mensagem-box {
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
        /* ... seu estilo existente ... */

        /* Novo estilo para o container */
        .custom-container {
        	margin-right: 120px;
            margin-left: 250px; /* Largura do menu lateral */
            padding-left: 125px; /* Espaçamento interno do container */
        }

        /* Ajustes para a tabela */
        .custom-container table {
            width: 100%;
        }
    </style>
    
</head>
<body>

<!-- Div para exibir a mensagem -->
<div class="mensagem-box" id="mensagem"><?php echo $mensagem; ?></div>

<script>
    // Exibe a mensagem temporária ao carregar a página
    window.onload = function () {
        var mensagemDiv = document.getElementById("mensagem");
        if (mensagemDiv.innerHTML !== "") {
            mensagemDiv.style.display = "block";

            // Esconde a mensagem após alguns segundos (por exemplo, 5 segundos)
            setTimeout(function () {
                mensagemDiv.style.display = "none";
            }, 5000); // Altere o valor aqui para ajustar o tempo de exibição
        }
    };
</script>

<div id="sidebar">
    <div id="logo">
        <img src="../TCC/img/logo.jpeg" alt="logo">
        <h1>Atleta Frequente</h1>
    </div>
    <ul>
        <li><a href="telainicial.php?MOD1=<?php echo "$MOD1"; ?>&MOD2=<?php echo "$MOD2"; ?>">Página Inicial</a></li>
        <li><a href="TELAMARCAR.php?MOD1=<?php echo "$MOD1"; ?>&MOD2=<?php echo "$MOD2"; ?>">Criar Aula</a></li>
        <li><a href="AULAS.php?MOD1=<?php echo "$MOD1"; ?>&MOD2=<?php echo "$MOD2"; ?>">Histórico de Aulas</a></li>
    </ul>
</div>

<div class="custom-container mt-4">    
	<div class="table-responsive">
        <div class="card rounded-xx1">
            <div class="card-body">
                <h3 class="card-title text-center">Relação De Alunos</h3>
                <table class="table table-hover table-borderless">
                    <thead class="thead-light">
                    <tr>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th>Turma</th>
                        <th>Nota</th>
                        <th>Perfil</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once 'conexao.php';

                    $dados = "SELECT Matricula_aluno, NOME, Turma ,Nota 
                              FROM tela_cadastro 
                              WHERE tipo_login = 1 AND Modalidadeindividual = '$MOD1' OR tipo_login = 1 AND Modalidadeindividual = '$MOD1' AND Modalidadeequipe = '$MOD2' OR tipo_login = 1 AND Modalidadeequipe = '$MOD2'";

                    $resposta = mysqli_query($conexao, $dados);

                    while ($linha = mysqli_fetch_array($resposta)) {
                        echo "<tr>
                                <td>$linha[Matricula_aluno]</td>
                                <td>$linha[NOME]</td>
                                <td>$linha[Turma]</td>
                                <td>$linha[Nota]</td>
                                <td>
                                    <a href='perfill.php?CODIGO=$linha[Matricula_aluno] & MOD1=$MOD1 & MOD2=$MOD2'>Perfil</a>
                                </td>
                                <td>
                                    <a href='excluir.php?CODIGO=$linha[Matricula_aluno]'>
                                        <img id='lixo' src='https://static.vecteezy.com/system/resources/thumbnails/009/344/493/small/x-transparent-free-png.png' alt='Excluir'/>
                                    </a>
                                </td>
                            </tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
