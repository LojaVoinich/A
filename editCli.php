<?php
  session_start();
  include_once("conexao.php");
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $result_usuario = "SELECT * FROM clientes WHERE id = '$id'";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  $row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <style>
  h1, h2, h3, label{
    color: white;
  }
  </style>
<title>Página Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"  href="devs2.css">
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
    <a href="apagarCli.php">Deletar</a>
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
    <a href="atualizarFun.php">Atualizar</a>
    <a href="apagalistFun.php">Deletar</a>
    </div>
    
  </div>
</div>
<?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
  <form method="POST" action="editarCli.php" onsubmit="return validarFormulario();">
    <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
      
      <label>Nome: </label>
      <input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>

      <label>CPF: </label>
      <input type="text" name="cpf" placeholder="Digite o seu CPF" value="<?php echo $row_usuario['cpf']; ?>"><br><br>

      <label>CNH: </label>
      <input type="text" name="cnh" placeholder="Digite sua CNH" value="<?php echo $row_usuario['cnh']; ?>"><br><br>

      <label>RG: </label>
      <input type="text" name="rg" placeholder="Digite o seu RG" value="<?php echo $row_usuario['rg']; ?>"><br><br>

      <label>Telefone: </label>
      <input type="text" name="telefone" placeholder="Digite o seu Telefone" value="<?php echo $row_usuario['telefone']; ?>"><br><br>

      <label>Endereço: </label>
      <input type="text" name="endereco" placeholder="Digite sua Cidade" value="<?php echo $row_usuario['endereco']; ?>"><br><br>
 
  <label>Estado: </label>
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

      <label>E-mail: </label>
      <input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>

      <label>Genero</label><br>
      <input type="radio" id="masc" name="genero" value="masculino">
      <label for="masc">masculino</label>
      <input type="radio" id="fem" name="genero" value="feminino">
      <label for="fem">Feminino</label>
      <input type="radio" id="ot" name="genero" value="outro">
      <label for="ot">Outro</label>
      <br>

      <label>Senha: </label>
      <input type="password" name="senha" value="<?php echo $row_usuario['senha']; ?>"><br><br>
      
      <input type="submit" value="Editar">
    </form>
  </body>
</html>