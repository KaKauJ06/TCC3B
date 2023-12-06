<?php
    $Matriculaparadeletar = $_GET['CODIGO'];
    include_once ('conexao.php');
    
    $excluir= "DELETE FROM treinos WHERE ID = '$Matriculaparadeletar'";
    mysqli_query($conexao,$excluir);
    header('Location:Aulas.php');
?>