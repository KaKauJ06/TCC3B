<?php
	$Matriculaparadeletar = $_GET['CODIGO'];
	include_once ('conexao.php');
	
	$excluir= "DELETE FROM tela_cadastro WHERE Matricula_aluno = '$Matriculaparadeletar'";
	mysqli_query($conexao,$excluir);
	header('Location:telainicial.php');
?>