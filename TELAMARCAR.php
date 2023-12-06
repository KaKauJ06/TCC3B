<?php
  $MOD1= $_GET['MOD1'];
  $MOD2= $_GET['MOD2']; 
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Criar Aula</title>
    <link rel="stylesheet" type="text/css" href="tela_inicial.css">
     <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
       <style>

         body {
            background-image:url(https://img.freepik.com/vetores-gratis/fundo-de-gradiente-de-linhas-azuis-dinamicas_23-2148995756.jpg?size=626&ext=jpg&ga=GA1.2.2129114298.1692552322&semt=ais);
       background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed; }

h2{
    text-align: center;
    margin-bottom: 20px;
}
     .message {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px;
            background-color: #dc3545; /* Cor vermelha para a mensagem de erro */
            color: #fff;
            border-radius: 5px;
            z-index: 9999;
        }
.card{
    margin:auto;
    justify-content:center;
    width: 30em;
    margin-top: 100px;
    background-color: #ebe8ea;
    padding: 60px;
    border-radius: 7%;
    box-shadow: 10px 10px 5px 5px #00000080;
}


        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
        <li><a href="telainicial.php?MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>">Página Inicial</a></li>
        <li><a href="TELAMARCAR.php?MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>">Criar Aula</a></li>
        <li><a href="AULAS.php?MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>">Histórico de Aulas</a></li>
    </ul>
</div>
    <div class="card">
        <h2 class="mb-2">Marcar Aula</h2><br>

            <form id="myForm" onsubmit="return validateForm()" action="processar_marcar.php?MOD1=<?php echo "$MOD1";?> & MOD2=<?php echo"$MOD2";?>" method="POST" autocomplete="off">
                    
                    <div class="row">

        <div class="col-md-14 mb-3">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>

        <div class="col-md-14 mb-3">
            <label for="dia">Dia:</label>
            <input type="date" class="form-control" id ="dia" name="dia" required>
        </div>

        <div class="col-md-14 mb-3">
            <label for="horario">Horário:</label>
            <input type="time" class="form-control" name="horario" required>
        </div>

        <div class="col-md-14 mb-3">
            <label for="observacoes">Observações:</label><br>
            <textarea class="form-control" name="observacoes" rows="4" cols="40"></textarea><br>
        </div>

        <input type="submit" value="Criar Aula">
    </div>
    </div>
</form>
<script>
    function validateForm() {
        var inputData = document.getElementById("dia").value;
        var inputDate = new Date(inputData);

       // Verifica se o ano está entre 2023 e o ano atual
            if (inputDate.getFullYear() < 2023 || inputDate.getFullYear() > new Date().getFullYear()) {
                var messageDiv = document.createElement('div');
                messageDiv.classList.add('message');
                messageDiv.textContent = "Por favor, insira um ano válido.";

                document.body.appendChild(messageDiv);

                // Configura o temporizador para remover a mensagem após alguns segundos
                setTimeout(function() {
                    messageDiv.style.display = 'none';
                    document.body.removeChild(messageDiv);
                }, 5000); // Tempo em milissegundos (5 segundos neste exemplo)

                return false;
            }
            
            return true;
        }
</script>
</body>
</html>
