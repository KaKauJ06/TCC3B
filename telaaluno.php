
<?php
session_start(); // Inicia a sessão para acessar variáveis de sessão

// Verifica se há uma mensagem na variável de sessão
if(isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    // Remove a mensagem da variável de sessão para não exibi-la novamente
    unset($_SESSION['mensagem'])
    ;
}else {
    // Se não houver sucesso no cadastro, redireciona de volta para a página do formulário
    $mensagem = "";
}

$Matriculaparaperfil = $_GET['CODIGO'];
include_once('conexao.php');

$perfil = "SELECT ID, NOME, Matricula_aluno, Idade, Genero, Turma, Modalidadeindividual, Modalidadeequipe, Altura, Peso,Nota FROM tela_cadastro WHERE Matricula_aluno = '$Matriculaparaperfil'";
$executar = mysqli_query($conexao, $perfil);

$linha = mysqli_fetch_array($executar);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil do Aluno</title>
    <link rel="stylesheet" type="Text/css" href="tela_inicial.css">
    <style type="text/css">

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
         /* Estilos para a div */
        .info-div {
            background-color: rgba(255, 255, 255, 0.5); /* Cor de fundo transparente */
            border-radius: 25px; /* Borda arredondada */
            padding: 20px;
            width: 800px; /* Largura da div aumentada para acomodar duas colunas */
            margin: 0 auto; /* Centraliza a div horizontalmente */
            text-align: left; /* Alinhamento à esquerda do texto */
            top: 15%;
            left: 25%;
            position: absolute;
            display: flex; /* Ativa o Flexbox para criar colunas */
            flex-wrap: wrap; /* Permite que as colunas quebrem para a próxima linha em telas estreitas */
            justify-content: space-between; /* Distribui o espaço uniformemente entre as colunas */
        }

        /* Estilos para a primeira coluna (rótulos) */
        .column1 {
            flex: 1; /* Cada coluna ocupa uma parte igual do espaço disponível */
            padding-right: 0px; /* Espaçamento à direita para separar as colunas */
        }

        /* Estilos para a segunda coluna (dados) */
        .column2 {
            flex: 1; /* Cada coluna ocupa uma parte igual do espaço disponível */
            padding-left: 0px; /* Espaçamento à esquerda para separar as colunas */
        }
        
        /* Estilos para o título */
        h2 {
            color: #333; /* Cor do texto */
            font-weight: bold;
            font-family: calibri;
        }
        
        /* Estilos para os rótulos */
        label {
            display: block; /* Coloca cada rótulo em uma nova linha */
            margin-bottom: 10px; /* Espaçamento entre os rótulos */
            font-weight: bold; /* Texto em negrito */
            font-family: Arial;
        }

 body{
    background-image:url(https://img.freepik.com/vetores-gratis/fundo-de-gradiente-de-linhas-azuis-dinamicas_23-2148995756.jpg?size=626&ext=jpg&ga=GA1.2.2129114298.1692552322&semt=ais);
background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed;
font-family: Arial, roboto,;
}
        /* Estilos para o botão */
        .custom-button {text-decoration: none;
            width: 60%; /* O botão ocupa toda a largura da coluna */
            height: 35px;
            padding: 8px;
            text-align: center;
            background-color: #0074d9; /* Cor azul, você pode personalizar */
            color: white;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 1.5s ease;
            margin-top: 20px; /* Espaçamento superior para o botão */
            
        }

        .custom-button:hover {
            background-color: #0056b3; /* Cor de hover, você pode personalizar */
        }

        /* Estilos para o campo de Comentário Particular */
        #Comentario {
            height: 80px;
            outline: none;
            border: 1px solid #ccc; /* Borda cinza */
            border-radius: 15px;
            padding: 10px;
            font-size: 14px;
        }
        #presenca{
            width: 60%; /* O botão ocupa toda a largura da coluna */
            height: 35px;
            padding: 8px;
            text-align: center;
            background-color: White; /* Cor azul, você pode personalizar */
            color: black;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 1.5s ease;
            margin-top: 20px; /* Espaçamento superior para o botão */
            outline: none;

        }
        #presenca:hover{
            background-color:SteelBlue ;
            text-decoration: none;
        }

    </style>
    
</head>

<body>
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
      <li><a href="telaaluno.php?CODIGO=<?php echo $Matriculaparaperfil; ?>">Página Inicial</a></li>

        <li><a href="AULASaluno.php?CODIGO=<?php echo $Matriculaparaperfil;?>">Histórico de Aulas</a></li>
    </ul>
</div>

    <div class="info-div">
        <div class="column1">
            <h2>Informações Pessoais</h2>
            <label>Nome:<?php echo "$linha[1]"; ?></label><br>
            <label>Turma:<?php echo "$linha[5]"; ?></label><br>
            <label>Matrícula: <?php echo"$linha[2]"?> </label><br>
            <label>Idade: <?php echo "$linha[3]"; ?></label><br>
            <label>Sexo: <?php echo "$linha[4]"; ?></label><br>
            <label>Modalidade Individual:<?php echo "$linha[6]"; ?></label><br>
             <label>Modalidade Coletiva:<?php echo "$linha[7]"; ?></label><br>
            
<button class="custom-button"> <a href='presencatelaaluno.php?aluno=<?php echo $linha[0];?> & CODIGO=<?php echo "$Matriculaparaperfil";?>'>Histórico de Frequência</a></button>
        </div>
        <div class="column2">
            <h2>Características Físicas</h2>
            <label>Altura: <?php echo " $linha[8]"; ?> </label>
            <label>Peso: <?php echo " $linha[9]"; ?></label>
            <label><?php $altura= $linha[8]/100; $IMC= $linha[9]/($altura*$altura);echo 'IMC: '; echo round($IMC,1);?></label>

   <h2>Nota Particular</h2>
                <label>Nota: <?php echo "$linha[10]"; ?></label><br>
            <!-- Botão "Ver meu histórico de frequência" -->
             <button class="custom-button"><a href='editaraluno.php?aluno1=<?php echo $linha[0];?>& CODIGO=<?php echo "$Matriculaparaperfil";?>'>Alterar Perfil</a></button>
        </div>
    </div>
</body>
</html>