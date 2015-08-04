<?php include "cabecalho.php"; ?>
<?php include "logica-usuario.php"; ?>

<h1>Seja Bem Vindo!</h1>

<?php
if (isset($_GET['login']) && $_GET['login'] == false) {
?>
<p class="alert-danger">Login ou Senha inválidos</p>
<?php
}
?>

<?php
if (isset($_GET['sucesso'])) {
?>
<p class="alert-success"><?=$_GET['sucesso']?></p>
<?php
}
?>

<?php
	if (isset($_GET['acessoNegado'])) {
?>
<p class="alert-warning">Você não possui acesso a essa funcionalidade</p>
<?php
	}
?>

<?php
if (!usuarioEstaLogado()) {
?>

<form action="login.php" method="POST">
	Login <input name="login" type="text"><br/>
	Senha <input name="senha" type="password"><br/>
	<button type="submit">Logar</button>
</form>

<?php
} else {
?>
<p class="alert-success">
	Você está logado como <strong><?=usuarioLogado() ?></strong>
</p>
<?php
}
?>

<?php include "rodape.php" ?>
