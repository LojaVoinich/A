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
	<h1 style="color: white; ">Formulario de cadastro do cliente</h1>
	<?php
          if(isset($_SESSION['msg']))
          {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?> 
	<div class="ex1">
		<form method="POST" action="recebepagina1.php" onsubmit="return validarFormulario();">
	<label>Nome do usuario</label><br>	
	<input type="text" class="text" name="nome" placeholder="Nome"><br><br>
	<label>CPF</label><br>
	<input type="text" class="text" name="cpf" placeholder="Seu CPF"><br><br>
	<label>CNH</label><br>
	<input type="text" class="text" name="cnh" placeholder="Sua CNH"><br><br>	
	<label>RG</label><br>
	<input type="text" class="text" name="rg" placeholder="Seu RG"><br><br>			
	<label>Telefone</label><br>
	<input type="text" class="text" name="telefone" placeholder="Seu Telefone"><br><br>			

	<label>Endereço</label><br>
	<input type="text" class="city" name="endereco" placeholder="Cidade">	
	<select name="estado">
		<option value="AC">AC</option>
		<option value="AL">AL</option>
		<option value="AP">AP</option>
		<option value="AM">AM</option>
		<option value="BA">BA</option>
		<option value="CE">CE</option>
		<option value="DF">DF</option>
		<option value="ES">ES</option>
		<option value="GO">GO</option>
		<option value="MA">MA</option>
		<option value="MT">MT</option>
		<option value="MS">MS</option>
		<option value="MG">MG</option>
		<option value="PA">PA</option>
		<option value="PB">PB</option>
		<option value="PR">PR</option>
		<option value="PE">PE</option>
		<option value="PI">PI</option>
		<option value="RJ">RJ</option>
		<option value="RN">RN</option>
		<option value="RS">RS</option>
		<option value="RO">RO</option>
		<option value="RR">RR</option>
		<option value="SC">SC</option>
		<option value="SP">SP</option>
		<option value="SE">SE</option>
		<option value="TO">TO</option>
	</select>		
	<br><br>

	

	<label>Email</label><br>
	<input type="email" class="text" name="email" placeholder="Seu Email"><br><br>

	<label>Genero</label><br>
	<input type="radio" id="masc" name="genero" value="masculino">
	<label for="masc">masculino</label>
	<input type="radio" id="fem" name="genero" value="feminino">
	<label for="fem">Feminino</label>
	<input type="radio" id="ot" name="genero" value="outro">
	<label for="ot">Outro</label>
	<br><br>

	<label>Senha</label><br>
	<input type="password" class="text" name="senha" placeholder=""><br><br>

	<label>Repetir senha</label><br>
	<input type="password" class="text" name="repetirSenha" placeholder=""><br><br>

	
	<label>Concordo com todos os <a href="termos.html">Termos de privacidade</a></label>
	<input type="checkbox" name="checkbox"><br><br>
	<input type="submit" class="text"  value="Cadastrar">
	<a href="index.php">
					<button type="button" class="text">Voltar</button>
				</a>
	
	</form>
	</div>

</body>
</html>