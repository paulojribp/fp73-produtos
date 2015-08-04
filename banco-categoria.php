<?php

function listaCategorias($conexao) {
	$resultado = mysqli_query($conexao, "select * from categorias");
	$categorias = array();
	while ($db = mysqli_fetch_assoc($resultado)) {
		$categoria = new Categoria();
		$categoria->setId( $db['id'] );
		$categoria->setNome($db['nome']);

		array_push($categorias, $categoria);
	}

	return $categorias;
}