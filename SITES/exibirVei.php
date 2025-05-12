<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Veículos</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
  background-color: #252422;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
}

.topnav {
  background-color:  darkred;
  overflow: visible;
  padding: 10px 0;
  display: flex;
  justify-content: center;
  position: relative;
  z-index: 9999;
}
.dropdown {
      position: relative;
      display: inline-block;
      margin: 0 10px;
    }

    .dropbtn {
      background-color: black;
      color: white;
      padding: 10px 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }

    .dropbtn:hover {
      background-color: darkred;
    }

 .dropdown-content {
  display: none;
  position: absolute;
  background-color: darkgray;
  min-width: 160px;
  border-radius: 5px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  z-index: 99999;
}


.dropdown-content a {
  color: white;
  padding: 10px 15px;
  display: block;
  text-decoration: none;
}

.dropdown-content a:hover {
  background-color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

h1 {
  text-align: center;
  color: red;
  margin: 40px 0 20px;
}

.veiculos-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
  padding: 0 20px 40px;
}

.veiculo-card {
  background-color: #000000;
  border-radius: 10px;
  box-shadow: 0px 0px 10px red;
  padding: 20px;
  width: 300px;
  color: white;
  transition: transform 0.3s ease;
  text-align: center;
}

.veiculo-card:hover {
  transform: translateY(-5px);
}

.veiculo-card img {
  border-radius: 8px;
  margin-bottom: 10px;
  width: 100%;
  max-height: 180px;
  object-fit: cover;
}

.veiculo-card p {
  margin: 5px 0;
}

.veiculo-card a {
  display: inline-block;
  margin-top: 10px;
  padding: 6px 12px;
  background-color: red;
  color: white;
  border-radius: 4px;
  text-decoration: none;
}

.veiculo-card a:hover {
  background-color: black;
}

.mensagem {
  text-align: center;
  color: darkgray;
  margin-top: 20px;
}

  </style>
</head>
<body>

<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn">Clientes <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="exibirClientes.php">Listagem geral</a>  
     <a href="loguin.php">Cadastro</a>
    <a href="atualizaListCli.php">Atualizar</a>
    <a href="apagarCli.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Veículos <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      
      <a href="logvei.php">Cadastro</a>
      <a href="atualistVei.php">Atualizar</a>
    <a href="delist.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Funcionários <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="exibirFuncionario.php">Listagem geral</a>  
      <a href="logfun.php">Cadastro</a>
      <a href="atualizarFun.php">Atualizar</a>
      <a href="apagalistFun.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Home <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="devs.php">Página Inicial</a>
    </div>
  </div>
</div>
<center>
<form name="edit_usuario" method="POST" action="">
  <input type="text" name="nome">
 <input type="submit" value="Pesquisar" name="EditarUsuario"> 
</form>
</center>

<h1>Veículos</h1>

<?php
if(isset($_SESSION['msg'])) {
  echo "<p class='mensagem'>" . $_SESSION['msg'] . "</p>";
  unset($_SESSION['msg']);
}
?>

<div class="veiculos-container">
<?php
if (empty($dados['EditarUsuario'])) {
    $nome = filter_input(INPUT_POST, 'nome');
$query_usuarios = "SELECT * FROM veiculo WHERE nome LIKE '%$nome%' ORDER BY id";
$result_usuarios = $conn2->prepare($query_usuarios);
$result_usuarios->execute();

while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
  extract($row_usuario);

  echo "<div class='veiculo-card'>";
  echo "<img src='";

  if(!empty($foto) && file_exists("imagens/$id/$foto")){
    echo "imagens/$id/$foto";
  } else {
    echo "imagens/icon_user.png";
  }

  echo "' alt='Imagem do veículo'>";

  echo "<p><strong>ID:</strong> $id</p>";
  echo "<p><strong>Placa:</strong> $placa</p>";
  echo "<p><strong>KM:</strong> $km</p>";
  echo "<p><strong>Ano:</strong> $ano</p>";
  echo "<p><strong>Chassi:</strong> $chassi</p>";
  echo "<p><strong>Cor:</strong> $cor</p>";
  echo "<p><strong>Tipo:</strong> $tipo</p>";
  echo "<p><strong>Renavam:</strong> $renavam</p>";
  echo "<p><strong>Nome:</strong> $nome</p>";
  echo "<p><strong>Preço:</strong> R$ $preco</p>";

  if(!empty($foto) && file_exists("imagens/$id/$foto")){
    echo "<a href='imagens/$id/$foto' download>Download da imagem</a>";
  }

  echo "</div>";
  }
}
?>
</div>

</body>
</html>
