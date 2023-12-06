<?php
include_once('conexao.php');
// Verifica a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Recebe os dados do formulário
$matricula = $_POST['matricula'];
$novaSenha = $_POST['nova_senha'];

// Verifica se a matrícula existe no banco de dados
$sql = "SELECT * FROM tela_cadastro WHERE Matricula_aluno = '$matricula'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // Matrícula válida, atualiza a senha
    $hashedSenha = password_hash($novaSenha, PASSWORD_DEFAULT); // Hash da senha (melhor prática)
    $sqlUpdate = "UPDATE tela_cadastro SET Senha = '$hashedSenha' WHERE Matricula_aluno = '$matricula'";
    
    if ($conexao->query($sqlUpdate) === TRUE) {
        header("refresh:1; url=telalogin.php");

    } else {
        echo "Erro ao atualizar a senha: " . $conexao->error;
    }
} else {
    echo "Matrícula não encontrada.";
    header("refresh:1; url=Rsenha.html");

}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
