<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Atualizar Veículos</title>
    <style>
      /* Reset de Margens e Padding */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      /* Corpo da página */
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: black;/*fundo*/
        color: #fff;
        padding: 30px;
      }

      /* Barra de navegação */
      .topnav {
        display: flex;
        justify-content: space-around;
        background-color: darkred;/*fundo Drop*/
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 30px;
      }

      .topnav .dropdown {
        position: relative;
      }

      .topnav .dropbtn {
        background-color: black;/*botao drop*/
        color: white;
        padding: 14px 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
      }

      .topnav .dropbtn:hover {
        background-color: darkred;/*efeito bt*/
      }

      .topnav .dropdown-content {
        display: none;
        position: absolute;
        background-color: darkgray;/*efeito abertura do bt*/
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 4px;
      }

      .topnav .dropdown-content a {
        color: white;/*letra*/
        padding: 12px 16px;
        display: block;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
      }

      .topnav .dropdown-content a:hover {
        background-color: black;/*efeito de fundo da letra*/
      }

      .topnav .dropdown:hover .dropdown-content {
        display: block;
      }

      /* Título da Página */
      h1 {
        color: white;
        margin-bottom: 20px;
        text-align: center;
      }

      /* Lista de Veículos */
      .list {
        max-width: 1000px;
        margin: 0 auto;
        background-color: #333;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .list h3 {
        color: white;
        margin-bottom: 20px;
        text-align: center;
      }

      .list a {
        color: white;
        text-decoration: none;
        padding: 8px 12px;
        background-color: black;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        display: inline-block;
        margin-right: 10px;
        margin-top: 10px;
      }

      .list a:hover {
        background-color: darkred;
      }

      /* Tabela de Veículos */
      .vehicle-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      .vehicle-table th,
      .vehicle-table td {
        padding: 15px;
        text-align: left;
        border: 1px solid red;
      }

      .vehicle-table th {
        background-color: black;
        color: white;
      }

      .vehicle-table td {
        background-color: black;/*nome dos vei*/
      }

      .vehicle-table tr:nth-child(even) td {
        background-color: #555;/*fundo preco*/
      }

      .vehicle-table tr:hover td {
        background-color: darkred;/*efeito de mouse*/
      }

      /* Imagem do Veículo */
      .vehicle-image img {
        max-width: 150px;
        border-radius: 8px;
      }

      /* Links de Ação */
      .action-links a {
        color: white;
        text-decoration: none;
        margin-right: 10px;
        transition: color 0.3s;
      }

      .action-links a:hover {
        color:white ;
      }
    </style>
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
    <a href="atualizaListCli.php">Atualizar</a>
    <a href="apagarCli.php">Deletar</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn">veiculos
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="logvei.php">Cadastro</a>
      <a href="atualistVei.php">Atualizar</a>
    <a href="delist.php">Deletar</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn">Funcionários
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="exibirFuncionario.php">Listagem geral</a>
          <a href="logfun.php">Cadastro</a>
          <a href="atualizarFun.php">Atualizar</a>
          <a href="apagalistFun.php">Deletar</a>
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

    <div class="list">
      <h1>Atualização de Veículos</h1>
      <h3>
        <?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }

        $query_usuarios = "SELECT * FROM veiculo ORDER BY id";
        $result_usuarios = $conn2->prepare($query_usuarios);
        $result_usuarios->execute();

        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
          extract($row_usuario);
          echo "<table class='vehicle-table'>";
          echo "<tr><th>ID</th><td>$id</td></tr>";
          echo "<tr><th>Placa</th><td>$placa</td></tr>";
          echo "<tr><th>Quilometragem</th><td>$km</td></tr>";
          echo "<tr><th>Ano</th><td>$ano</td></tr>";
          echo "<tr><th>Chassi</th><td>$chassi</td></tr>";
          echo "<tr><th>Cor</th><td>$cor</td></tr>";
          echo "<tr><th>Tipo</th><td>$tipo</td></tr>";
          echo "<tr><th>Renavam</th><td>$renavam</td></tr>";
          echo "<tr><th>Nome</th><td>$nome</td></tr>";
          echo "<tr><th>Preço</th><td>$preco</td></tr>";
          echo "<tr><th>Foto</th><td class='vehicle-image'><img src='imagens/$id/$foto' alt='Imagem do Veículo'></td></tr>";
          echo "</table>";
          
          echo "<div class='action-links'>";
          echo "<a href='AtualizaVei.php?id=$id'>Editar</a>";
          echo "<a href='editImg.php?id=$id'>Editar Foto</a>";
          echo "</div><hr>";
        }
        ?>
      </h3>
    </div>
  </body>
</html>
