<?php
require("verificar_sessao.php");
require('conexao.php');

$acao = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : $acao;
$excluir = isset($_GET['excluir']) ? $_GET['excluir'] : $excluir;

$sql = '';

$sql = "select * from tbusuarios";

if ($excluir){
  $sql = "DELETE FROM tbusuarios WHERE `tbusuarios`.`codigo_usuario` = {$excluir}";
  $resultado = mysqli_query($con, $sql);
  header('Location: listar_usuarios.php?pesquisar=todos');
}


$resultado = mysqli_query($con, $sql);

$linha = mysqli_num_rows($resultado);

// echo $linha;

?>

  <html>

  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
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

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Listagem de categorias
            </div>

            <div class="card-body">
              <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $linha['descricao_usuario'] ?></h5>
                    <?php $codigo = $linha['codigo_usuario'] ?>
                    <?php echo $linha['nome_usuario'] . "  alterar  - <a href=listar_usuarios.php?excluir=$codigo>Excluir</a> <br>"; ?>
                  </div>
                </div>
            <?php }
             ?>

            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php" style="text-decoration: none;"><button class="btn btn-lg btn-warning btn-block">Voltar</button></a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>