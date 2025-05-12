<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<script>
		// Função para redirecionar para a página de recuperação de senha
		function blo() {
			window.location.replace('logfun.php'); // Redireciona para a página de recuperação de senha
		}
	</script>
	<link rel="stylesheet" type="text/css" href="lp.css">
</head>
<body style="background-color: black;">
	<center>
		<?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<div class="ex1">
			<form method="POST" action="recebeloginusuario.php">
				<label>Email</label><br>
				<input type="email" class="text" name="email" placeholder="seu email"><br>
				<label>Senha</label><br>
				<input type="password" class="text" name="senha"><br><br>

				<!-- Botão para redirecionar para a página de recuperação de senha -->
				<button type="button" class="text" onclick="blo()">Esqueci minha senha</button><br>

				<!-- Botão para fazer o login -->
				<input type="submit" class="text" value="Entrar"><br><br>

				<!-- Botão para voltar à página anterior -->
				<a href="index.php">
					<button type="button" class="text">Voltar</button>
				</a>

				<!-- Botão para criar uma nova conta (redirecionando para a página de registro) -->
				<a href="loguin.php">
					<button type="button" class="text">Criar Conta</button>
				</a>
			</form>
		</div>
	</center>
</body>
</html>
