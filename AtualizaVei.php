<?php

session_start();
ob_start();


include_once "conexao.php";

// Receber o ID do registro
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Acessa o IF quando nao existe o ID
if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    
} else {
    // QUERY para recuperar os dados do registro
    $query_usuario = "SELECT * FROM veiculo WHERE id=:id LIMIT 1";
    $result_usuario = $conn2->prepare($query_usuario);
    $result_usuario->bindParam(':id', $id, PDO::PARAM_INT);
    $result_usuario->execute();

    // Verificar se encontrou o registro no banco de dados
    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        header("Location: AtualizaVei.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        h2, h3{
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
      <!--<a href="AtualizaVei.php">Atualizar</a>-->
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

 <h2>Atualizar Veiculo</h2><h3>

<?php
  
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Verificar se o usuario clicou no botao
    if (!empty($dados['EditarUsuario'])) {
        //var_dump($dados);
        // Criar a QUERY editar no banco de dados
        $query_edit_usuario = "UPDATE veiculo SET placa=:placa, km=:km, ano=:ano, chassi=:chassi, cor=:cor, tipo=:tipo, renavam=:renavam, nome=:nome, preco=:preco WHERE id=:id";
        $edit_usuario = $conn2->prepare($query_edit_usuario);
        $edit_usuario->bindParam(':placa', $dados['placa'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':km', $dados['km'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':ano', $dados['ano'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':chassi', $dados['chassi'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':cor', $dados['cor'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':renavam', $dados['renavam'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':id', $id, PDO::PARAM_INT);

        // Verificar se editou com sucesso
        if ($edit_usuario->execute()) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
            header("Location: exibirVei.php?id=$id");
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";
        }
    }
    ?>

    <form name="edit_usuario" method="POST" action="">
        <?php
        $placa = "";
        if (isset($row_usuario['placa'])) {
            $placa = $row_usuario['placa'];
        }
        ?>
        <label>Placa: </label>
        <input type="text" name="placa" id="placa" placeholder="Placa" value="<?php echo $placa; ?>" autofocus required><br><br>

        <?php
        $km = "";
        if (isset($row_usuario['km'])) {
            $km = $row_usuario['km'];
        }
        ?>
        <label>Quilometragem: </label>
        <input type="text" name="km" id="km" placeholder="Quilometragem" value="<?php echo $km; ?>" autofocus required><br><br>

        <?php
        $ano = "";
        if (isset($row_usuario['ano'])) {
            $ano = $row_usuario['ano'];
        }
        ?>
        <label>Ano: </label>
        <input type="text" name="ano" id="ano" placeholder="Ano" value="<?php echo $ano; ?>" autofocus required><br><br>

        <?php
        $chassi = "";
        if (isset($row_usuario['chassi'])) {
            $chassi = $row_usuario['chassi'];
        }
        ?>
        <label>Chassi: </label>
        <input type="text" name="chassi" id="chassi" placeholder="Chassi" value="<?php echo $chassi; ?>" autofocus required><br><br>

        <?php
        $cor = "";
        if (isset($row_usuario['cor'])) {
            $cor = $row_usuario['cor'];
        }
        ?>
        <label>Cor: </label>
        <input type="text" name="cor" id="cor" placeholder="Cor do Veiculo" value="<?php echo $cor; ?>" autofocus required><br><br>

        <?php
        $renavam = "";
        if (isset($row_usuario['renavam'])) {
            $renavam = $row_usuario['renavam'];
        }
        ?>
        <label>Renavam: </label>
        <input type="text" name="renavam" id="renavam" placeholder="Renavam" value="<?php echo $renavam; ?>" autofocus required><br><br>

        <?php
        $nome = "";
        if (isset($row_usuario['nome'])) {
            $nome = $row_usuario['nome'];
        }
        ?>
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do veiculo" value="<?php echo $nome; ?>" autofocus required><br><br>

        <?php
        $preco = "";
        if (isset($row_usuario['preco'])) {
            $preco = $row_usuario['preco'];
        }
        ?>
        <label>Preço: </label>
        <input type="text" name="preco" id="preco" placeholder="Preço" value="<?php echo $preco; ?>" autofocus required><br><br>

        <input type="submit" value="Salvar" name="EditarUsuario">

    </form>

</body>

</html>
