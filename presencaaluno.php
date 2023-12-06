<?php
include_once('conexao.php');

$aluno_id = $_GET['aluno'];

// Consulta para obter as aulas e a presença do aluno
$sql = "SELECT t.Aula, t.Dia, t.Horario, c.Presenca
        FROM treinos t
        LEFT JOIN chamada c ON t.ID = c.aula_id AND c.aluno_id = $aluno_id";

$result = $conexao->query($sql);

$pegardata = mysqli_fetch_array($result);
$dia= date('d/m/Y', strtotime($pegardata[1]));
$MOD1= $_GET['MOD1'];
$MOD2= $_GET['MOD2'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presença de alunos</title>
    <link rel="stylesheet" type="text/css" href="tela_inicial.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            text-align: center;
        }
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
     <div class="tabel-responsive">
    <div class="card rounded-xx1">
        <div class="card-body">
            <h3 class="card-title text-center">Presença nas aulas</h3>
            <table class="table table-hover table-borderless">
               <thead class="thead-light">
                <tr>
                    <th>Aula</th>
                    <th>Dia</th>
                    <th>Horário</th>
                    <th>Presença</th>
                </tr>
                </thead>
                <tbody>
    </div>
    </div>
</div>
</div>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $presenca = $row['Presenca'] ? 'Presente' : 'Ausente';
        echo "<tr><td>" . $row['Aula'] . "</td><td>" . $dia . "</td><td>" . $row['Horario'] . "</td><td>" . $presenca . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conexao->close();
?>
</body>
</html>
