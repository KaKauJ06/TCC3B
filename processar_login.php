
<?php
 session_start(); // Inicia a sessão para utilizar variáveis de sessão
include_once('conexao.php');

// Captura dos dados do formulário
if (isset($_POST['matricula']) && isset($_POST['senha'])) {
    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];

     // Consulta SQL para verificar o login
    $sql_code = "SELECT * FROM tela_cadastro WHERE Matricula_aluno = ? LIMIT 1";
    
    // Usando prepared statement para prevenir injeção de SQL
    $stmt = $conexao->prepare($sql_code);
    $stmt->bind_param("s", $matricula);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['Senha'])) {
            if ($user['tipo_login'] == 2) { // Substitua 'NOME_DA_COLUNA' pelo nome correto da coluna
                $_SESSION['mensagem'] = "Login realizado com sucesso!";
                header("Location: telainicial.php?MOD1=$user[Modalidadeindividual] & MOD2=$user[Modalidadeequipe]");
                exit(); // Certifique-se de encerrar o script após redirecionar
            } 


            else {
                $_SESSION['mensagem'] = "Login realizado com sucesso!";
                header("Location: telaaluno.php?CODIGO=$matricula");
                exit();
            }
        } 


        else {
            $_SESSION['mensagem'] = "Falha no login";
            header("Location: TELALOGIN.php");
            exit();
        }
    } 


    else {
        $_SESSION['mensagem'] = "Usuário não encontrado";
        header("Location: TELALOGIN.php");
        exit();
    }
}
?>+

















