<?php
require("verificar_sessao.php");
require('conexao.php');

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'inserir') {
  $usuario = $_POST['usuario'];
  $descricaoUsuario = $_POST['descricaoUsuario'];
  $senha = $_POST['senha'];
  $tipoUsuario = $_POST['tipoUsuario'];

    $sql = "INSERT INTO `tbusuarios` (`nome_usuario`, `descricao_usuario`, `descricao_senha`, `tipo_usuario`) VALUES ('{$usuario}', '{$descricaoUsuario}', '{$senha}', '{$tipoUsuario}')";

  header('Location: cadastrar_usuario.php');

  $resultado = mysqli_query($con, $sql);

  $resultado->exec;

}

// INSERT INTO `tbchamados` (`codigo_chamado`, `titulo_chamado`, `descricao_chamado`, `codigo_categoria`) VALUES (NULL, '', '', '')

$sql = "select * from tbcategoria";

$resultado = mysqli_query($con, $sql);

$linha = mysqli_num_rows($resultado);
?>
<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-abrir-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-abrir-chamado">
        <div class="card">
          <div class="card-header">
            Cadastro de usuario
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">

                <form method="POST" action="cadastrar_usuario.php?acao=inserir">
                  <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                  </div>
                  <div class="form-group">
                    <label>Descrição do usuario</label>
                    <input type="text" name="descricaoUsuario" class="form-control" placeholder="Descrição do usuario" required>
                  </div>
                  <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                  </div>

                  <div class="form-group">
                    <label>Tipo de usuario</label>
                    <select class="form-control" name="tipoUsuario">
                        <option value="administrador">
                            Administrador
                        </option>
                        <option value="comum">
                            Comum
                        </option>
                    </select>
                  </div>

                  <div class="row mt-5">


                    <div class="col-6">
                      <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>