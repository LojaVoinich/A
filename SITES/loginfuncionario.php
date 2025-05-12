<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<script>
		
		function blo() {
			window.location.replace('logfun.php')
		}
		//function blos() {
		//	window.location.replace('#')
		//}

	</script>
	<link rel="stylesheet" type="text/css" href="lp.css">
</head>
<body style="background-color: black;"><center>
	<?php
          if(isset($_SESSION['msg']))
          {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?>
       	
	<div class="ex1">
	<form method="POST" action="recebeloginfuncionario.php">	
	<label>Email</label><br>
	<input type="email" class="text" name="email" placeholder="seu email"><br>
	<label>Senha</label><br>
	<input type="password" class="text" name="senha"><br><br>
	<button class="text" onclick="blo()">Esqueci minha senha</button><br>
	<input type="submit" class="text"  value="entrar"><br><br>
	</form>	
	</div>
</body>
</html>