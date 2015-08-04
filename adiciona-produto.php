<?php include "cabecalho.php"; ?>
<?php include "conecta.php"; ?>
<?php include "b2anco-produto.php"; ?>
<?php

require_once 'autoload.php';

$produto = new Produto();
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);

$produto->getCategoria()->setId($_POST['categoriaid']);

if (array_key_exists('usado', $_POST)) {
	$produto->setUsado('true');
} else {
	$produto->setUsado('false');
}

$sucesso = false;
$dao = new ProdutoDAO($conexao);

if (array_key_exists('id', $_POST) && $_POST['id'] != '') {
	//$sucesso = alteraProduto($conexao, $nome, $preco, $descricao, $categoriaid, $usado, $id);
	$produto->setId($_POST['id']);
	$sucesso = $dao->alteraProduto($produto);
} else {
	$sucesso = $dao->insereProduto($produto);
}

if ($sucesso) {
?>
	<p class="text-success">Produto <?=$produto->getNome() ?>, <?=$produto->getPreco() ?> SALVO com sucesso.</p>
<?php
} else {
	$erro = mysqli_error($conexao);
?>
	<p class="text-danger">Produto <?=$produto->getNome() ?> não foi SALVO: <?=$erro ?></p>
<?php
}

include "rodape.php";

?>