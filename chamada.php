<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro de Presença</title>
    <link rel="stylesheet" type="text/css" href="tela_inicial.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos para a mensagem */
     
         body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        h2 {
            margin-top: 20px;
        }

        form {
            margin: 20px;
            padding: 20px;        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>   
    <div class="container mt-4">
        <div class="tabel-responsive">
            <div class="card rounded-xx1">
                <div class="card-body"> 
                    <h3 class="card-title text-center">Registro de Presença</h3>

                    <?php
                    $MOD1= $_GET['MOD1'];
                    $MOD2= $_GET['MOD2'];
                    $idparachamada = $_GET['chamada'];
                    include_once('conexao.php');

                    $alunos = "SELECT ID, NOME 
                               FROM tela_cadastro 
                               WHERE tipo_login = 1 AND Modalidadeindividual = '$MOD1' OR tipo_login = 1 AND Modalidadeindividual = '$MOD1' AND Modalidadeequipe = '$MOD2' OR tipo_login = 1 AND Modalidadeequipe = '$MOD2'
                               ORDER BY NOME";


                    $resultado_alunos = mysqli_query($conexao, $alunos);

                    if (mysqli_num_rows($resultado_alunos) > 0) {
                        echo '<form action="processarchamada.php?MOD1=' . $MOD1 . '&MOD2=' . $MOD2 . '" method="POST">';
                        echo '<input type="hidden" name="id_aula" value="' . $idparachamada . '">';
                        echo "<table class='table '><thead class='thead-light'>";
                        echo '<tr><th>Nome do Aluno</th><th>Presença</th></tr>';

                        while ($row = mysqli_fetch_assoc($resultado_alunos)) {
                            $id_aluno = $row['ID'];
                            $nome_aluno = $row['NOME'];

                            echo '<tr>';
                            echo '<td>' . $nome_aluno . '</td>';
                            echo '<td><input type="checkbox" name="presenca[]" value="' . $id_aluno . '"></td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                        echo '<input type="submit" value="Registrar Presença">';
                        echo '</form>';
                    } else {
                        echo 'Nenhum aluno encontrado.';
                    }

                    // Feche a conexão com o banco de dados.
                    mysqli_close($conexao);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
