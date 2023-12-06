<?php
session_start(); // Inicie a sessão
$MOD1= $_GET['MOD1'];
$MOD2= $_GET['MOD2'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o ID da aula foi enviado.
    if (isset($_POST["id_aula"])) {
        include_once ('conexao.php');

        // ID da aula e lista de IDs dos alunos (presença).
        $id_aula = $_POST["id_aula"];
        $presenca_alunos = $_POST["presenca"];

        // Remova todos os registros de presença para esta aula.
        $sql_delete = "DELETE FROM chamada WHERE aula_id = '$id_aula'";
        if (mysqli_query($conexao, $sql_delete)) {
            // Insira os novos registros de presença.
            foreach ($presenca_alunos as $aluno_id) {
                $sql_insert = "INSERT INTO chamada (aula_id, aluno_id, Presenca) VALUES ('$id_aula', '$aluno_id', 1)";
                mysqli_query($conexao, $sql_insert);
            }

            // Após registrar a presença com sucesso, defina a variável de sessão
            $_SESSION['presenca_registrada'] = true;

            // Redirecionamento após o registro de presença
            header("Location: aula.php?CODIGO=$id_aula&MOD1=$MOD1&MOD2=$MOD2");
            exit();
        } else {
            echo "Erro ao registrar presença: " . mysqli_error($conexao);
        }

        // Feche a conexão com o banco de dados.
        mysqli_close($conexao);
    } else {
        echo "ID da aula não fornecido.";
    }
} else {
    echo "Acesso inválido.";
}
?>
?>