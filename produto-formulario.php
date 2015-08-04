<?php include "cabecalho.php" ?>
<?php include "conecta.php"; ?>
<?php include "banco-categoria.php"; ?>
<?php include "banco-produto.php"; ?>
<?php require_once "produto.php"; ?>
<?php require_once "categoria.php"; ?>
<?php

$categorias = listaCategorias($conexao);

$produto = new Produto();
if (array_key_exists("id", $_GET)) {
	$id = $_GET['id'];
	$produto = buscaProduto($conexao, $id);
}

?>

<div class="pull-left">
	<h1>Formulário de Produtos</h1>

	<form action="adiciona-produto.php" method="post">
		<div class="form-group">
	    <label for="nome">Nome</label>
			<input class="form-control" name="nome" id="nome"
				value="<?=$produto->getNome() ?>">
		</div>
		<div class="form-group">
			<label for="preco">Preço</label>
			<input class="form-control" type="number" name="preco" id="preco"
				value="<?=$produto->getPreco() ?>">
		</div>
		<div class="form-group">
			<label for="descricao">Descrição</label>
			<textarea class="form-control" name="descricao"
				id="descricao"><?=$produto->getDescricao() ?></textarea>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="usado"
					<?= $produto->getUsado() == true ? 'checked' : '' ?>
					> Usado
			</label>
		</div>
		<div class="form-group">
			<select class="form-control" name="categoriaid">
				<?php foreach ($categorias as $categoria) { ?>
				<option value="<?=$categoria->getId() ?>"
					<?= $produto->getCategoria()->getId() == $categoria->getId() ? 'selected' : '' ?>
					><?=$categoria->getNome() ?></option>
				<?php } ?>
			</select>
		</div>
		<input type="hidden" name="id" value="<?=$produto->getId() ?>">
		<button type="submit" class="btn btn-primary">Cadastrar</button>
	</form>
</div>

<?php include "rodape.php" ?>
