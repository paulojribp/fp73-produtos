<?php

session_start();

function logarUsuario($usuario) {
	$_SESSION['usuario_logado'] = $usuario;
}

function usuarioEstaLogado() {
	if (array_key_exists('usuario_logado', $_SESSION)) {
		return true;
	}

	return false;
}

function verificaUsuario() {
	if (!usuarioEstaLogado()) {
		header("Location: index.php?acessoNegado=true");
		die();
	}
}

function usuarioLogado() {
	return $_SESSION['usuario_logado']['login'];
}

function logout() {
    session_destroy();
}
