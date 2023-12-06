<?php
session_start();

// Verifica se a variável de sessão está definida e se é verdadeira (indicando sucesso no cadastro)
if(isset($_SESSION['cadastro_sucesso']) && $_SESSION['cadastro_sucesso'] === true) {
    // Define a mensagem a ser exibida na caixa
    $mensagem = "O Cadastro Foi Realizado Com Sucesso!";
    // Remove a variável de sessão para que a mensagem não seja exibida novamente após atualizar a página
    unset($_SESSION['cadastro_sucesso']);
} else {
    // Se não houver sucesso no cadastro, redireciona de volta para a página do formulário
    $mensagem = "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <title>LOGIN</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<style type="text/css">

    /* Estilos para a caixa da mensagem */
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


body{
background-image:url(https://img.freepik.com/vetores-gratis/fundo-de-gradiente-de-linhas-azuis-dinamicas_23-2148995756.jpg?size=626&ext=jpg&ga=GA1.2.2129114298.1692552322&semt=ais);
background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed;
font-family: Arial, roboto,;
}


	.container{

		display:flex;
		width: 100%;
		justify-content:center;
		margin-top: 100px;
	}


.card{
	background-color: #ebe8ea;
	padding: 80px;
	border-radius: 7%;
	box-shadow: 4px 4px 1px 1px #00000080;
}


h1{
	text-align: center;
	margin-bottom: 20px;
	color: ;
}


.label-float input{
	width: 100%;
	padding: 8px 8px;
	display: inline-block;
	border: 0;
	border-bottom: 2px solid ;
	background-color: transparent;
	outline: none;
	min-width: 180px;
	font-size: 16px;
	transition: all .3s ease-out;
	border-radius: 0;
}


.label-float{
	position: relative;
	padding-top: 15px;
	margin-top: 5%;
	margin-bottom: 5%;
}


.label-float input:focus{
	border-bottom: 2px solid ;
}


.label-float label{
	color: black;
	pointer-events: none;
	position: absolute;
	top: 0;
	left: 0;
	margin-top:3px;
	transition: all .3s ease-out;
	font-size: 18px;
}


.label-float input:focus + label{
	font-size:13px;
	margin-top: 0;
	color: ;
}


button{
	background-color: transparent;
	border-color: ;
	color: ;
	padding: 7px;
	font-weight: bold;
	font-size: 12pt;
	margin-top: 20px;
	border-radius: 4px;
	cursor: pointer;
	outline: none;
}


button:hover{

	background-color:black ;
	color: white;
	transition: all .4s ease-out;
}


.justify-center{
	display: flex;
	justify-content: center;
}


hr{
	color: ;
	margin-top: 10%;
	margin-bottom: 10%;
	width: 80%;
}


p{color:black;
	font-size: 15pt;
	text-align: center;
}


a{
	color: ;
	font-weight: bold;
	text-decoration: none;
}


a:hover{
	color:black;
	transition: all .2s ease-out;
}


</style>

<body>

<!-- Div para exibir a mensagem -->
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


<form id="LOGIN" action="processar_login.php" method="POST">
    <div class="container"> 
        <div class="card">
            <h1>Login</h1>

            <div class="label-float">
                <input type="text" id="matricula" name="matricula" placeholder="" autofocus>
                <label for="matricula">Matricula</label>
            </div>

            <div class="label-float">
                <input type="password" id="senha" name="senha" placeholder="">
                <label for="Senha">Senha</label>
            </div>

            <div class="justify-center">
                <button type="submit" id="botaoEntrar">Entrar</button>
            </div>

            <div class="justify-center"><hr></div>

            <p>Não possui login?
                <a href="TELACADASTRO.php">Cadastre-se!</a>
            </p>
				
            <p>
                <a href="Rsenha.html">Recuperar Senha</a>
            </p>	         
        </div>
    </div>
</form>

<div id="mensagem" style="display: none;"></div>
<script>
document.getElementById("botaoEntrar").addEventListener("click", function(event) {
  var usuario = document.getElementsByName("matricula")[0].value;
  var senha = document.getElementsByName("senha")[0].value;
  var mensagemDiv = document.getElementById("mensagem");

  if (usuario === "" && senha === "") {
    event.preventDefault(); // Evita o envio do formulário se nenhum campo foi preenchido
    mensagemDiv.innerText = "Preencha Os Campos Necessários !";
    mensagemDiv.style.display = "block";

    // Esconde a mensagem após alguns segundos (por exemplo, 5 segundos)
    setTimeout(function() {
      mensagemDiv.style.display = "none";
    }, 5000); // Altere o valor aqui para ajustar o tempo de exibição
  }
});
</script>

</body>
</html>