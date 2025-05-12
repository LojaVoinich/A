<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Loguin usuario</title>
	<script src="validador.js"></script>
	<link rel="stylesheet" type="text/css" href="lp.css">
</head>
<body style="background-color: black;">
<center>
	<h1 style="color: white;">Formulario de cadastro do Funcionário</h1>
	<?php
          if(isset($_SESSION['msg']))
          {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?> 
	<div class="ex1">
		<form method="POST" action="recebeFun.php" onsubmit="return validarFormulario();">
	<label>Nome do usuario</label><br>	
	<input type="text" class="text" name="nome" placeholder="Nome"><br><br>
	<label>CPF</label><br>
	<input type="text" class="text" name="cpf" placeholder="Seu CPF"><br><br>
	<label>Email</label><br>
	<input type="email" class="text" name="email" placeholder="Seu Email"><br><br>
	<label>Senha</label><br>
	<input type="password" class="text" name="senha" placeholder=""><br><br>
	<label>Reprtir senha</label><br>
	<input type="password" class="text" name="repetirSenha" placeholder=""><br><br>

	<input type="submit" class="text"  value="Cadastrar">
	
	</form>
	</div>

</body>
</html>