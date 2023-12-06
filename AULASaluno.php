<?php
session_start();

if (isset($_SESSION['att_cadastro']) && $_SESSION['att_cadastro'] === true) {
    $mensagem = "Atualizado Com Sucesso!";
    unset($_SESSION['att_cadastro']);
} else {
    $mensagem = "";
}
$Matriculaparaperfil = $_GET['CODIGO'];
include_once('conexao.php');

$perfil = "SELECT ID, NOME, Matricula_aluno, Idade, Genero, Turma, Modalidadeindividual, Modalidadeequipe, Altura, Peso FROM tela_cadastro WHERE Matricula_aluno = '$Matriculaparaperfil'";
$executar = mysqli_query($conexao, $perfil);

$linha = mysqli_fetch_array($executar);

$Matriculaparaperfil = $_GET['CODIGO'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tabela de Aulas</title>
     <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Título da página</title>
    <link rel="stylesheet" type="text/css" href="tela_inicial.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>/* Novo estilo para o container */
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
<div class="custom-container mt-4">
  <div class="card rounded-xx1">
    <div class="card-body">
      <h3 class="card-title text-center">Relação de Aulas</h3>
      <table class="table table-borderless">
            <thead class="thead-light">
            <tr>
                <th>Título</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>


            <?php
              include_once 'conexao.php';

            $dados = "SELECT ID,Aula,Dia, Horario FROM treinos";

            $resposta = mysqli_query($conexao,$dados);

            while ($linha = mysqli_fetch_array($resposta)){
                echo "<tr>
                <td>$linha[Aula]</td>
                <td>$linha[Dia]</td>
                <td>$linha[Horario]</td>
                <td>
                <a href='aulaaluno.php?CODIGO=$linha[ID] & CODIGO1=$Matriculaparaperfil'> Ver mais </a>
                </td>
                 
        </tr>";
    }
    
?>

        </tbody>
    </table>
</body>
</html>