<?php

class ProdutoDAO {

	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function listaProdutos() {
		$produtos = array();

		$query = "select p.*, c.nome as categoria_nome "
					. "from produtos p left join categorias c on c.id = p.categoria_id";
		$resultado = mysqli_query($this->conexao, $query);
		
		while ($db = mysqli_fetch_assoc($resultado)) {
			$produto = new Produto();
			$produto->setId( $db['id'] );
			$produto->setNome( $db['nome'] );
			$produto->setPreco( $db['preco'] );
			$produto->setUsado( $db['usado'] );
			$produto->setDescricao($db['descricao']);
			$produto->setCategoria(new Categoria());
			$produto->getCategoria()->setId($db['categoria_id']);
			$produto->getCategoria()->setNome($db['categoria_nome']);

			array_push($produtos, $produto);
		}

		return $produtos;
	}

	function insereProduto($produto) {
		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) "
						. "values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()})";

		return mysqli_query($this->conexao, $query);
	}

	function alteraProduto($produto) {
	//function alteraProduto($conexao, $nome, $preco, $descricao, $categoriaid, $usado, $id) {
		/*$query = "update produtos "
			. "set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', "
			. "  categoria_id = {$categoriaid}, usado = {$usado} "
			. "where id = {$id}";*/

		$query = "update produtos "
			. "set nome = '{$produto->nome}', preco = {$produto->preco}, "
			. "  descricao = '{$produto->descricao}', "
			. "  categoria_id = {$produto->categoriaid}, usado = {$produto->usado} "
			. "where id = {$produto->id}";

		return mysqli_query($this->conexao, $query);
	}

	function removeProduto($id) {
		$query = "delete from produtos where id = {$id}";
		return mysqli_query($this->conexao, $query);
	}

	function buscaProduto($id) {
		$query = "select * from produtos where id = {$id}";
		$resultado = mysqli_query($this->conexao, $query);
		$db = mysqli_fetch_assoc($resultado);
		$produto = new Produto();
		$produto->id = $db['id'];
		$produto->nome = $db['nome'];
		$produto->preco = $db['preco'];
		$produto->usado = $db['usado'];
		$produto->descricao = $db['descricao'];
		$produto->categoria = new Categoria();
		$produto->categoria->id = $db['categoria_id'];

		return $produto;
	}

}

