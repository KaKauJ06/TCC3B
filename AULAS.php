<?php
// Iniciando a sessão
session_start();

// Verificando se a variável de sessão está definida
if(isset($_SESSION['aula_criada']) && $_SESSION['aula_criada'] === true) {
    // Exibindo a mensagem de aula criada
   $mensagem = "Aula Criada Com Sucesso!";

    // Removendo a variável de sessão
    unset($_SESSION['aula_criada']);
} else {
    // Se a variável de sessão não estiver definida ou for falsa, redireciona de volta para a página inicial ou de erro
   $mensagem = "";
}

$MOD1= $_GET['MOD1'];
$MOD2= $_GET['MOD2'];
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

    <style type="text/css">
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
    
!-- Div para exibir a mensagem -->
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
<div class="custom-container mt-4">
     <div class="tabel-responsive">
  <div class="card rounded-xx1">
    <div class="card-body">
      <h3 class="card-title text-center">Relação de Aulas</h3>
      <table class="table table-hover table-borderless">
			<thead class="thead-light">
            <tr>
                <th>Título</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Infomações</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody> 


            <?php
	          include_once 'conexao.php'; 

			$dados = "SELECT ID,Aula,DATE_FORMAT(Dia, '%d/%m/%Y'), Horario 
                      FROM treinos 
                      WHERE Modalidade1 = '$MOD1' AND Modalidade1 != 'NENHUMA' OR Modalidade2 = '$MOD2' AND Modalidade2 !='NENHUMA'";

			$resposta = mysqli_query($conexao,$dados);

			while ($linha = mysqli_fetch_array($resposta)){
				echo "<tr>
				<td>$linha[Aula]</td>
				<td>$linha[2]</td>
				<td>$linha[Horario]</td>
				<td>
				<a href='aula.php?CODIGO=$linha[ID]&MOD1=$MOD1&MOD2=$MOD2'> Ver mais </a>
				</td>
				 <td>
                <a href='excluiraulas.php?CODIGO=$linha[ID]'>
                    <img id='lixo' src='https://static.vecteezy.com/system/resources/thumbnails/009/344/493/small/x-transparent-free-png.png' alt='Excluir'/>
                    </a>
                </td>    
		</tr>";
	}
	
?>

        </tbody>
    </table>
</body>
</html>