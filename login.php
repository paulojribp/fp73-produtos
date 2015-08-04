<?php
include "conecta.php";
include "banco-usuario.php";
include "logica-usuario.php";

session_start();

$usuario = buscaUsuario($conexao, $_POST['login'], $_POST['senha']);

if (empty($usuario) ) {
	header("Location: index.php?login=0");
} else {
	logarUsuario($usuario);
	header("Location: index.php?login=1");
}
die();
