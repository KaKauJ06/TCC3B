
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
</head>
<style type="text/css">
    body {
        background-image:url(https://img.freepik.com/vetores-gratis/fundo-de-gradiente-de-linhas-azuis-dinamicas_23-2148995756.jpg?size=626&ext=jpg&ga=GA1.2.2129114298.1692552322&semt=ais);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        font-family: Arial, roboto;
    }
    .mensage {
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

    h2 {
        text-align: center;
    }

    .card {
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
     <script>
        // Função para exibir a mensagem e removê-la após alguns segundos
        window.onload = function() {
            var messageDiv = document.querySelector('.mensage');
            if (messageDiv) {
                messageDiv.style.display = 'block';
                setTimeout(function() {
                    messageDiv.style.display = 'none';
                }, 5000); // Tempo em milissegundos (5 segundos neste exemplo)
            }
        };
    </script>
<body>
    <?php
session_start();

// Verifica se existe uma mensagem na sessão e a exibe
if (isset($_SESSION['matricula_existente'])) {
        echo '<div class="mensage">' . $_SESSION['matricula_existente'] . '</div>';
        // Remove a mensagem da sessão
        unset($_SESSION['matricula_existente']);
    }
?>

    <div class="card">
        <form id="CADASTRO" action="processar_cadas.php" method="POST" autocomplete="off">
            <div class="row">

                
                <h1 class="mb-2">Cadastro</h1><br>
                <div class="col-md-14 mb-3">

                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Digite seu Nome Completo" required>
                </div>

                <div class="col-md-14 mb-3">
                    <label for="matricula aluno">Matricula do Aluno</label>
                    <input type="text" name="m_a" class="form-control" placeholder="Digite sua Matricula de Aluno " required>
                </div>

                <div class="col-md-14 mb-3">
                    <label for="idade">Idade</label>
                    <input type="number" name="idade" id="idade" class="form-control" placeholder="Digite sua Idade" required maxlength="2">
                </div>

                <div id="mensagem" class="col-md-14 mb-3 alert alert-danger" style="display: none;"></div>

                <div class="col-md-14 mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required>
                </div>

                <div class="col-md-14 mb-3">
                    <label for="altura">Altura</label>
                    <input type="text" name="altura" class="form-control" placeholder="Digite sua altura em cm" required required maxlength="3">
                </div>

                <div class="col-md-14 mb-3">
                    <label for="peso">Peso</label>
                    <input type="text" name="peso" class="form-control" placeholder="Digite seu peso em kg" required required maxlength="3">
                </div>

                <div class="col-md-14 mb-3">
                    <label for="genero">Gênero</label>
                    <select class="form-control" id="genero" name="genero">
                        <option value="" disabled selected>Escolha o Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>

                <div class="col-md-14 mb-3">
                    <label for="Turma:">Turma</label><br>
                    <select class="form-control" id="Turma:" name="Turma:" required>
                        <option value="" disabled selected>Escolha a Sua Turma</option>
                        <option value="6°A">6°A</option>
                        <option value="6°B">6°B</option>
                        <option value="7°A">7°A</option>
                        <option value="7°B">7°B</option>
                        <option value="8°A">8°A</option>
                        <option value="8°B">8°B</option>
                        <option value="9°A">9°A</option>
                        <option value="9°B">9°B</option>
                    </select>
                </div>

                <div class="col-md-14 mb-3">
                    <label for="MODALIDADES">MODALIDADES INDIVIDUAIS</label><br>
                    <select class="form-control" id="MODALIDADESIND" name="MODALIDADESIND" required>
                        <option value="" disabled selected> Escolha a Sua Modalidade Individual</option>
                        <option value="NENHUMA">NENHUMA</option>
                        <option value="ATLETISMO">ATLETISMO</option>
                        <option value="BADMINTON">BADMINTON</option>
                        <option value="JUI_JITSU">JUI-JITSU</option>
                        <option value="TAEKWOND">TAEKWOND</option>
                    </select>
                </div>

                <div class="col-md-14 mb-3">
                    <label for="MODALIDADES">MODALIDADES EM EQUIPE</label><br>
                    <select class="form-control" id="MODALIDADESCOLE" name="MODALIDADESCOLE" required>
                        <option value="" disabled selected> Escolha a Sua Modalidade em Equipe</option>
                        <option value="NENHUMA">NENHUMA</option>
                        <option value="BASQUETEBOL">BASQUETEBOL</option>
                        <option value="FUTEBOL_DE_CAMPO">FUTEBOL DE CAMPO</option>
                        <option value="FUTSAL">FUTSAL</option>
                        <option value="HANDEBOL">HANDEBOL</option>
                        <option value="VOLEI_DE_QUADRA">VOLEI DE QUADRA</option>
                        <option value="VOLEI_DE_PRAIA">VOLEI DE PRAIA</option>
                    </select>       
                </div>

                <div class="justify-center">
                    <input type="submit" name="salvar" value="SALVAR" class="btn btn-info"/>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("CADASTRO").addEventListener("submit", function(event) {
            var idadeInput = document.getElementById("idade");
            var idade = parseInt(idadeInput.value);
            var mensagem = document.getElementById("mensagem");

            if (idade < 11 || idade > 70) {
                mensagem.textContent = "A idade deve estar entre 11 e 70 anos.";
                mensagem.style.display = "block";
                event.preventDefault();
                setTimeout(function() {
                    mensagem.style.display = "none";
                }, 3000); // Esconde a mensagem após 3 segundos (3000 milissegundos)
            }
        });
    </script>
</body>
</html>
