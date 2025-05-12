<?php
  session_start();
  include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <style>
    /* Resetando o estilo padrão */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: black; /* Cor de fundo neutra */
      color: red;
      line-height: 1.6;
    }

    h1, h2, h3 {
      color: darkred;
      margin-bottom: 20px;
      font-weight: 600;
    }

    /* Estilo da barra de navegação */
    .topnav {
      background-color: darkred;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topnav .dropdown {
      position: relative;
      display: inline-block;
    }

    .topnav .dropdown .dropbtn {
      background-color: black;
      color: white;
      border: none;
      padding: 12px 16px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
    }

    .topnav .dropdown:hover .dropbtn {
      background-color: darkred;
    }

    .topnav .dropdown-content {
      display: none;
      position: absolute;
      background-color: darkgray;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 5px;
    }

    .topnav .dropdown:hover .dropdown-content {
      display: block;
    }

    .topnav .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: 14px;
    }

    .topnav .dropdown-content a:hover {
      background-color: black;
      color: white;
    }

    /* Estilo de conteúdo */
    .content {
      max-width: 1200px;
      margin: 30px auto;
      padding: 30px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .client-list {
      background-color: black;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .client-list h3 {
      margin-top: 0;
      font-size: 22px;
      color: red;
    }

    .client-list p {
      margin: 8px 0;
      font-size: 16px;
    }

    .client-list a {
      color: red;
      text-decoration: none;
      font-weight: bold;
      font-size: 16px;
    }

    .client-list a:hover {
      text-decoration: underline;
    }

    /* Paginação */
    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .pagination a {
      padding: 10px 15px;
      background-color: black;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      margin: 0 5px;
      font-size: 16px;
    }

    .pagination a:hover {
      background-color: darkred;
    }

    .pagination a:active {
      background-color: white;
    }

    .pagination span {
      padding: 10px 15px;
      background-color: white;
      color: red;
      font-size: 16px;
    }

    /* Estilo para mensagens de erro ou sucesso */
    .msg {
      font-size: 16px;
      font-weight: 500;
      text-align: center;
      padding: 10px;
      margin-bottom: 20px;
    }

    .msg-success {
      color: white;
      background-color: black;
      border-radius: 5px;
    }

    .msg-error {
      color: red;
      background-color: black;
      border-radius: 5px;
    }

    /* Estilos responsivos */
    @media (max-width: 768px) {
      .topnav {
        flex-direction: column;
        align-items: flex-start;
      }

      .topnav .dropdown-content a {
        font-size: 14px;
      }

      .content {
        padding: 20px;
      }

      .client-list {
        padding: 15px;
      }

      .pagination a {
        font-size: 14px;
        padding: 8px 12px;
      }


    }

    .cor h1{

color: red;
      margin-bottom: 20px;
      font-weight: 600;

    }
  </style>

  <title>Página Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="devs2.css">
</head>
<body>

<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn">Clientes
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="exibirClientes.php">Listagem geral</a>
      <a href="loguin.php">Cadastro</a>
      <a href="apagarCli.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Veículos
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
</div>

<div class="content">
<div class="cor ">
  <h1>Listagem dos Clientes</h1>
</div>

  <?php
    if(isset($_SESSION['msg'])){
      echo "<div class='msg msg-error'>".$_SESSION['msg']."</div>";
      unset($_SESSION['msg']);
    }
    
    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);   
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
    //Setar a quantidade de itens por página
    $qnt_result_pg = 2;
    
    //Calcular o início da visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    
    $result_usuarios = "SELECT * FROM clientes LIMIT $inicio, $qnt_result_pg";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
    
    while($row_aluno = mysqli_fetch_assoc($resultado_usuarios)) {
      echo "<div class='client-list'>";
      echo "<h3>Cliente: " . $row_aluno['nome'] . "</h3>";
      echo "ID: " . $row_aluno['id'] . "<br>";
      echo "CPF: " . $row_aluno['cpf'] . "<br>";
      echo "CNH: " . $row_aluno['cnh'] . "<br>";
      echo "RG: " . $row_aluno['rg'] . "<br>";
      echo "Telefone: " . $row_aluno['telefone'] . "<br>";
      echo "Endereço: " . $row_aluno['endereco'] . "<br>";
      echo "Estado: " . $row_aluno['estado'] . "<br>";
      echo "E-mail: " . $row_aluno['email'] . "<br>";
      echo "Gênero: " . $row_aluno['genero'] . "<br>";
      echo "<a href='editCli.php?id=" . $row_aluno['id'] . "'>Editar</a><br> <hr>";
      echo "</div>";
    }
    
    // Paginação
    $result_pg = "SELECT COUNT(id) AS num_result FROM clientes";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    
    // Quantidade de páginas
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
    
    // Limitar os links antes e depois
    $max_links = 2;
    
    echo "<div class='pagination'>";
    echo "<a href='atualizaListCli.php?pagina=1'>Primeira</a> ";
    
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
      if($pag_ant >= 1){
        echo "<a href='atualizaListCli.php?pagina=$pag_ant'>$pag_ant</a> ";
      }
    }
    
    echo "<span>$pagina</span>";
    
    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
      if($pag_dep <= $quantidade_pg){
        echo "<a href='atualizaListCli.php?pagina=$pag_dep'>$pag_dep</a> ";
      }
    }
    
    echo "<a href='atualizaListCli.php?pagina=$quantidade_pg'>Última</a>";
    echo "</div>";
  ?>

</div>

</body>
</html>
