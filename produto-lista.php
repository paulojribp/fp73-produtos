 <?php include "cabecalho.php"; ?>
<?php include "conecta.php"; ?>
<?php include "banco-produto.php"; ?>
<?php include "produto.php"; ?>
<?php include "categoria.php"; ?>
<?php
	require_once "logica-usuario.php";
	require_once 'autoload.php';

	verificaUsuario();
?>

Usuário logado: <?=usuarioLogado() ?>

<?php if (array_key_exists('removido', $_GET) && $_GET['removido'] == true) { ?>

	<p class="alert-success">Produto removido com sucesso.</p>
<?php } ?>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="text-center">Nome</th>
			<th class="text-center">Preço</th>
			<th class="text-center">Preço com Desconto</th>
			<th class="text-center">Descrição</th>
			<th class="text-center">Categoria</th>
			<th class="text-center" colspan="2">Ações</th>
		</tr>
	</thead>
<?php

$dao = new ProdutoDAO($conexao);
$produtos = $dao->listaProdutos();
foreach ($produtos as $produto) :
?>
	<tr>
		<td><?=$produto->getNome() ?></td>
		<td><?=$produto->getPreco() ?></td>
		<td><?=$produto->subtraiDesconto(0.1) ?></td>
		<td><?=substr($produto->getDescricao(), 0, 40) ?> ...</td>
		<td><?=$produto->getCategoria()->getNome() ?></td>
		<td class="text-center">
			<form method="post" action="remove-produto.php">
				<input type="hidden" name="id" value="<?=$produto->getId() ?>">
				<button class="btn btn-danger" type="submit">Remover</button>
			</form>
		</td>
		<td class="text-center">
			<form method="get" action="produto-formulario.php">
				<input type="hidden" name="id" value="<?=$produto->getId() ?>">
				<button class="btn btn-primary" type="submit">Alterar</button>
			</form>
		</td>
	</tr>

<?php
endforeach
?>
</table>

<?php include "rodape.php"; ?>