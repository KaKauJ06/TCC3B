<?php
session_start();

include_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recebendo os dados do formulário
    $nota = $_POST['nota'];
    $nome = $_POST['nome'];
    $matricula = $_POST['m_a'];
    $idade =$_POST['idade'];
    // Verificar se a matrícula já existe no banco de dados
    $verificar_matricula = "SELECT Matricula_aluno FROM tela_cadastro WHERE Matricula_aluno = '$matricula' LIMIT 1";
    $result = $conexao->query($verificar_matricula);

    if ($result->num_rows > 0) {
    // Armazena a mensagem na sessão
    $_SESSION['matricula_existente'] = "Já existe um cadastro com essa matrícula, por favor, verifique novamente.";
    // Redireciona para a página de cadastro
    header("Location: TELACADASTRO.php");
    exit;
}
 else {
    $senhausuario = $_POST['senha']; $senhacript = password_hash($senhausuario, PASSWORD_DEFAULT); // Hash da senha para segurança
    $genero = $_POST['genero'];
    $turma = $_POST['Turma:'];
    $modalidadeindi = $_POST['MODALIDADESIND'];
    $modalidadeequipe = $_POST['MODALIDADESCOLE'];
    $altura= $_POST['altura'];
    $peso= $_POST['peso'];
        // Inserindo os dados no banco de dados
        $sql = "INSERT INTO tela_cadastro(NOME, Matricula_Aluno, Idade, Senha, Genero, Turma, Modalidadeindividual, Modalidadeequipe, Altura, Peso, tipo_login, Nota) VALUES ('$nome', '$matricula', '$idade', '$senhacript','$genero','$turma','$modalidadeindi','$modalidadeequipe','$altura','$peso','1','0,0')";

        if ($conexao->query($sql) === TRUE) {
            // Define a variável de sessão como true se os dados foram inseridos com sucesso
            $_SESSION['cadastro_sucesso'] = true;
        } else {
            echo "Erro ao inserir dados: " . $conexao->error;
        }

        $conexao->close();

        // Redireciona para outra página após o envio do formulário
        header("Location: TELALOGIN.php");
        exit;
    }
}
?>
