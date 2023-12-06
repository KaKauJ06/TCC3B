<?php
    $servidor = 'LOCALHOST';
    $usuario  = 'root';
    $senhabanco ='';
    $banco    = 'cadastro1';

    $conexao = mysqli_connect($servidor,$usuario,$senhabanco,$banco);

    if ($conexao == false){
        echo "NÃO FOI POSSIVEL REALIZAR A CONEXÃO COM O SERVIDOR";};
?>