<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listar Dados</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="devs2.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: black;
      padding: 20px;
    }

    h1 {
      color: red;
      margin-bottom: 20px;
      text-align: center;
    }

.topnav {
  background-color:  #1e1e1e;
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
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: darkred;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

.list {
  position: relative;
  z-index: 1;
}

  .vehicle-card {
  background-color: white;
  border-radius: 8px;
  padding: 20px;
  margin: 20px auto; /* centraliza no centro da tela */
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  max-width: 600px; /* define a largura máxima da caixa */
  width: 90%; /* torna responsivo para telas menores */
}


    .vehicle-card p {
      font-size: 16px;
      margin-bottom: 6px;
      color: #333;
    }

    .vehicle-card img {
      margin-top: 10px;
      border-radius: 6px;
    }

    .vehicle-card a {
      display: inline-block;
      margin-top: 10px;
      text-decoration: none;
      color: white;
      background-color: black;
      padding: 8px 12px;
      border-radius: 5px;
      margin-right: 10px;
      transition: background-color 0.3s;
    }

    .vehicle-card a:hover {
      background-color: #0056b3;
    }

    hr {
      margin: 20px 0;
      border: 0;
      border-top: 1px solid #ccc;
    }

    @media (max-width: 600px) {
      .topnav {
        flex-direction: column;
      }
      .dropdown {
        margin-bottom: 10px;
      }
    }
  </style>
</head>
  </style>
</head>
<body>
  <div class="topnav">
    <div class="dropdown">
      <button class="dropbtn">Clientes <i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
        <a href="exibirClientes.php">Listagem geral</a>
        <a href="loguin.php">Cadastro</a>
        <a href="#">Atualizar</a>
        <a href="#">Deletar</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Veículos <i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
        <a href="logvei.php">Cadastro</a>
        <a href="#">Atualizar</a>
        <a href="#">Deletar</a>
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

  <div class="list">
    <h1>Veículos</h1>

    <?php
    if(isset($_SESSION['msg'])) {
      echo "<p style='color:red'>" . $_SESSION['msg'] . "</p>";
      unset($_SESSION['msg']);
    }

    $query_usuarios = "SELECT * FROM veiculo ORDER BY id";
    $result_usuarios = $conn2->prepare($query_usuarios);
    $result_usuarios->execute();

    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        extract($row_usuario);
        echo "<div class='vehicle-card'>";
        echo "<p><strong>ID:</strong> $id</p>";
        echo "<p><strong>Placa:</strong> $placa</p>";
        echo "<p><strong>Quilometragem:</strong> $km</p>";
        echo "<p><strong>Ano:</strong> $ano</p>";
        echo "<p><strong>Chassi:</strong> $chassi</p>";
        echo "<p><strong>Cor:</strong> $cor</p>";
        echo "<p><strong>Tipo:</strong> $tipo</p>";
        echo "<p><strong>Renavam:</strong> $renavam</p>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>Preço:</strong> R$ $preco</p>";
        echo "<p><strong>Foto:</strong></p>";
        if(!empty($foto) && file_exists("imagens/$id/$foto")){
            echo "<img src='imagens/$id/$foto' width='150'><br>";
            echo "<a href='imagens/$id/$foto' download>Download</a>";
        } else {
            echo "<img src='imagens/icon_user.png' width='150'><br>";
        }
        echo "<a href='delVei.php?id=$id' style='background-color: #dc3545;'>Deletar</a>";
        echo "</div>";
    }
    ?>
  </div>
</body>
</html>
