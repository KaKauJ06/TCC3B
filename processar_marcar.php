<?php
session_start();
include_once ('conexao.php');
$titulo = $_POST['titulo'];
$dia = $_POST['dia'];
$horario = $_POST['horario'];
$observacoes = $_POST['observacoes'];

$MOD1= $_GET['MOD1'];
$MOD2= $_GET['MOD2'];

$sql = "INSERT INTO treinos (Aula, Dia, Horario, Observacoes, Modalidade1, Modalidade2) VALUES ('$titulo', '$dia', '$horario', '$observacoes','$MOD1','$MOD2')";

if ($conexao->query($sql) === TRUE) {
    // Define a variável de sessão como true se os dados foram inseridos com sucesso
    $_SESSION['aula_criada'] = true;
} else {
    echo "Erro ao inserir dados: " . $conexao->error;
}

$conexao->close();

// Redireciona para outra página após o envio do formulário
header("Location: AULAS.php?MOD1=$MOD1 & MOD2=$MOD2");
exit;
?>