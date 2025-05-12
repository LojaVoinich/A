<head>
  <title>Página Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: black;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .topnav {
      background-color: darkred; /*drpdown*/
      display: flex;
      justify-content: center;
      padding: 10px 0;
      flex-wrap: wrap;
      position: relative;
      z-index: 5;
    }

    .dropdown {
      position: relative;
      display: inline-block;
      margin: 0 15px;
    }

    .dropbtn {
      background-color: black;/*botao*/
      color: white;
      padding: 12px 18px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }

    .dropbtn:hover {
      background-color: darkred;/*fundo botao*/
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: darkgrey;
      min-width: 180px;
      border-radius: 5px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      z-index: 10;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: 15px;
    }

    .dropdown-content a:hover {
      background-color: black;/*fundo do drop*/
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .content {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 60px 20px;
      z-index: 1;
      position: relative;
    }

    .content img {
      max-width: 100%;
      width: 300px;
      border: 5px solid white;/*contorno*/
      border-radius: 10px;
      box-shadow: 0 0 20px red;
      transition: transform 0.3s ease;
    }

    .content img:hover {
      transform: scale(1.05);
    }

    @media (max-width: 600px) {
      .topnav {
        flex-direction: column;
        align-items: center;
      }

      .dropdown {
        margin-bottom: 10px;
      }

      .content img {
        width: 80%;
      }
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
        <a href="exibirVei.php">Listagem geral</a>      
        <a href="logvei.php">Cadastro</a>
        <a href="atualistVei.php">Atualizar</a>
        <a href="delist.php">Deletar</a>
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

  <div class="content">
    <center>
      <img src="logo.PNG" alt="Logo">
    </center>
  </div>

</body>
</html>
