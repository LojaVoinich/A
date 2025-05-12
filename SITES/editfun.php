<?php
	session_start();
	include_once("conexao.php");
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM Funcionario WHERE id = '$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<style>
	label{
		color: white;
	}
</style>	
<title>Página Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="devs2.css">
</head>
<body>

<div class="topnav">

  <div class="dropdown">
    <button class="dropbtn">clientes
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
     <a href="exibirClientes.php">Listagem geral</a>  
     <a href="loguin.php">Cadastro</a>
    <a href="#">Atualizar</a>
    <a href="#">Deletar</a>
    </div>
    
  </div>

  <div class="dropdown">
    <button class="dropbtn">veiculos
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="exibirVei.php">Listagem geral</a>      
      <a href="logvei.php">Cadastro</a>
      <a href="#">Atualizar</a>
    <a href="#">Deletar</a>
  </div>
  </div>
  <div class="dropdown">
    <button class="dropbtn">Funcionarios
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
     <a href="exibirFuncionario.php">Listagem geral</a>  
     <a href="logfun.php">Cadastro</a>
    <a href="#">Atualizar</a>
    <a href="#">Deletar</a>
    </div>

  </div>
   <div class="dropdown">
    <button class="dropbtn">Home
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="devs.php">Pagina Inicial</a>
    </div>
    
  </div>
</div>
		<p><hr><h1  style="color: white;">Editar dados do Funcionario</h1> <p> <hr>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
	<form method="POST" action="editarFun.php">
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label class="p">Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>

			<label class="p">CPF: </label>
			<input type="text" name="cpf" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['cpf']; ?>"><br><br>
			
			<label class="p">E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>

			<label class="p">Senha: </label>
			<input type="password" name="senha" value="<?php echo $row_usuario['senha']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>