<?php
session_start();
$ID = $_GET['aluno1'];
    include_once 'conexao.php';
    $res = mysqli_query($conexao,"SELECT NOME,Idade,Genero,Turma,Modalidadeindividual,Modalidadeequipe,Altura,Peso,Matricula_aluno FROM tela_cadastro WHERE ID = $ID");
    $dados = mysqli_fetch_array($res);
    if (isset($_POST['salvar'])) {
    $ID = $_GET['aluno1'];
    $novo_nome = $_POST["nome"];
    $nova_idade = intval($_POST['idade']);
    if ($nova_idade <= 0 || $nova_idade > 70) {
        die("Por favor, insira uma idade válida (entre 1 e 70).");
    }

    $novo_genero = $_POST["genero"];
    $nova_turma = $_POST["turma"];
    $nova_modal = $_POST["MODALIDADESIND"];
    $nova_equip = $_POST["MODALIDADESCOLE"];
    $nova_altura = $_POST["altura"];
    $novo_peso = $_POST["peso"];

    $att = "UPDATE tela_cadastro SET NOME = '$novo_nome', Idade ='$nova_idade', Genero = '$novo_genero', Turma = '$nova_turma', Modalidadeindividual = '$nova_modal', Modalidadeequipe = '$nova_equip', Altura = '$nova_altura', Peso = '$novo_peso' WHERE ID = $ID";

    if ($conexao->query($att) === TRUE) {
        $_SESSION['att_cadastro'] = true;
        header("Location: telaaluno.php?CODIGO=$dados[8]");
        exit();
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }

    $conexao->close();
}
$Matriculaparaperfil = $_GET['CODIGO'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar Cadastro</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="tela_inicial.css">
<style type="text/css">
    body{
    background-image:url(https://img.freepik.com/vetores-gratis/fundo-de-gradiente-de-linhas-azuis-dinamicas_23-2148995756.jpg?size=626&ext=jpg&ga=GA1.2.2129114298.1692552322&semt=ais);
background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed;
font-family: Arial, roboto,;
}
h2{
    text-align: center;
}
#notificacao{
    background-color: whitesmoke;
   top: -970px;
    left: 700px;
    width: 300px;
    border-color: SeaGreen;
    color:;
}
.card{
    margin:auto;
    justify-content:center;
    width: 40em;
    margin-top: 100px;
    background-color: #fff;
    padding: 90px;
    background-color:#ebe8ea;
    border-radius: 20px;
    box-shadow: 10px 10px 5px 5px #00000080;
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
        <div class="card">
       <form method="POST" autocomplete="off">
                <div class="row">
                     <h1 class="mb-2">Alterar Cadastro</h1><br>
            <div class="col-md-14 mb-3">
            <label for="nome">Nome</label>
          <input type="text" name="nome" class="form-control" placeholder="Digite seu Nome Completo" value ="<?php echo $dados[0];?>" required>
           </div>

            <div class="col-md-14 mb-3">
        <label for="idade">Idade</label>
        <input type="text" name="idade" class="form-control" placeholder="Digite sua Idade " value ="<?php echo $dados[1];?>" required maxlength="2">
           </div>


             <div class="col-md-14 mb-3">
        <label for="altura">Altura em cm</label>
        <input type="text" name="altura" class="form-control" placeholder="Digite sua altura em cm" value ="<?php echo $dados[6];?>"required required maxlength="3">
            </div>

             <div class="col-md-14 mb-3">
        <label for="peso">Peso em kg</label>
        <input type="text" name="peso" class="form-control" placeholder="Digite seu peso em kg" value ="<?php echo $dados[7];?>"required required maxlength="3">
            </div>

            <div class="col-md-14 mb-3">
        <label for="genero">Gênero</label>
        <select class="form-control" id="genero" name="genero">
            <option value="" disabled selected>Escolha o Sexo</option>
            <option <?php if ($dados[2] == 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option <?php if ($dados[2] == 'Feminino') echo 'selected'; ?>>Feminino</option>
        </select>
            </div>

            <div class="col-md-14 mb-3">
        <label for="Turma">Turma</label><br>
        <select class="form-control" id="turma" name="turma" required>
               <option value="" disabled selected>Escolha a Sua Turma</option>
            <option <?php if ($dados[3] == '6°A') echo 'selected'; ?>>6°A</option>
            <option <?php if ($dados[3] == '6°B') echo 'selected'; ?>>6°B</option>
            <option <?php if ($dados[3] == '7°A') echo 'selected'; ?>>7°A</option>
            <option <?php if ($dados[3] == '7°B') echo 'selected'; ?>>7°B</option>
            <option <?php if ($dados[3] == '8°A') echo 'selected'; ?>>8°A</option>
            <option <?php if ($dados[3] == '8°B') echo 'selected'; ?>>8°B</option>
            <option <?php if ($dados[3] == '9°A') echo 'selected'; ?>>9°A</option>
            <option <?php if ($dados[3] == '9°B') echo 'selected'; ?>>9°B</option>
        </select>
            </div>

     <div class="col-md-14 mb-3">
        <label for="MODALIDADES">MODALIDADES INDIVIDUAIS</label><br>
     <select class="form-control" id="MODALIDADESIND" name="MODALIDADESIND" required>
        <option value="" disabled selected> Escolha a Sua Modalidade Individual</option>
        <option <?php if ($dados[4] == 'NENHUMA') echo 'selected'; ?>>NENHUMA</option>
        <option <?php if ($dados[4] == 'ATLETISMO') echo 'selected'; ?>>ATLETISMO</option>
        <option <?php if ($dados[4] == 'BADMINTON') echo 'selected'; ?>>BADMINTON</option>
        <option <?php if ($dados[4] == 'JUI_JITSU') echo 'selected'; ?>>JUI-JITSU</option>
        <option <?php if ($dados[4] == 'TAEKWOND') echo 'selected'; ?>>TAEKWOND</option>
     </select>
 </div>

             <div class="col-md-14 mb-3">
     <label for="MODALIDADES">MODALIDADES EM EQUIPE</label><br>
     <select class="form-control" id="MODALIDADESCOLE" name="MODALIDADESCOLE" required>
        <option value="" disabled selected> Escolha a Sua Modalidade em Equipe</option> 
        <option <?php if ($dados[5] == 'NENHUMA') echo 'selected'; ?>>NENHUMA</option>
        <option <?php if ($dados[5] == 'BASQUETEBOL') echo 'selected'; ?>>BASQUETEBOL</option>
        <option <?php if ($dados[5] == 'FUTEBOL_DE_CAMPO') echo 'selected'; ?>>FUTEBOL DE CAMPO</option>
        <option <?php if ($dados[5] == 'FUTSAL') echo 'selected'; ?>>FUTSAL</option>
        <option <?php if ($dados[5] == 'HANDEBOL') echo 'selected'; ?>>HANDEBOL</option>
        <option <?php if ($dados[5] == 'VOLEI_DE_QUADRA') echo 'selected'; ?>>VOLEI DE QUADRA</option>
        <option <?php if ($dados[5] == 'VOLEI_DE_PRAIA') echo 'selected'; ?>>VOLEI DE PRAIA</option>
     </select>       
</div>
</div>
       <div class="justify-center">
             <input type="submit" name="salvar" value="Alterar" class="btn btn-info"/>
</form>
</div>
</body>
</html>