<?php

function buscaUsuario($conexao, $login, $senha) {
	$senha = md5($senha);
	$query = "select * from usuarios where login='{$login}' and senha = '{$senha}'";
	
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}
