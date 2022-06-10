<?php
require("verificar_sessao.php");
require('conexao.php');

$acao = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : $acao;

$sql = '';

if ($acao == 'titulo') {
  $pesq = $_POST['tituloTarefa'];
  $sql = "select 
            t1.titulo_chamado, t2.nome_categoria, t1.descricao_chamado
          from
            tbchamados as t1 inner join tbcategoria as t2 on t1.codigo_categoria = t2.codigo_categoria where t1.titulo_chamado LIKE '%{$pesq}%'";
} else if ($acao == 'categoria') {
  $pesq = $_POST['categoriaTarefa'];
  $sql = "select 
            t1.titulo_chamado, t2.nome_categoria, t1.descricao_chamado
          from
            tbchamados as t1 inner join tbcategoria as t2 on t1.codigo_categoria = t2.codigo_categoria where t2.nome_categoria LIKE '%{$pesq}%' ";
} else if ($acao = 'todos') {
  $pesq = $_POST['todasTarefas'];
  $sql = "select 
            t1.titulo_chamado, t2.nome_categoria, t1.descricao_chamado
          from
            tbchamados as t1 inner join tbcategoria as t2 on t1.codigo_categoria = t2.codigo_categoria";
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
              Consulta de chamado
            </div>
            <div style="margin: 20px;">
              <form method="post" action="consultar_chamado.php?pesquisar=titulo">
                <div class="form-group">
                  <label>Pesquisar por titulo:</label>
                  <input class="form-control" type="text" name="tituloTarefa" placeholder="Exemplo: Cliente">
                  <button class="btn btn-primary" style="margin-top: 10px;">Pesquisar</button>
                </div>
              </form>

              <form method="post" action="consultar_chamado.php?pesquisar=categoria">
                <div class="form-group">
                  <label>Pesquisar por categoria:</label>
                  <input class="form-control" type="text" name="categoriaTarefa" placeholder="Exemplo: Suporte">
                  <button class="btn btn-primary" style="margin-top: 10px;">Pesquisar</button>
                </div>
              </form>
            </div>

            <div class="card-body">

              <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $linha['titulo_chamado'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $linha['nome_categoria'] ?></h6>
                    <p class="card-text"><?php echo $linha['descricao_chamado'] ?></p>
                  </div>
                </div>
            <?php }
             ?>

            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php" style="text-decoration: none;"><button class="btn btn-lg btn-warning btn-block">Voltar</button></a>
              </div>
              <div class="col-6">
                <a href="consultar_chamado.php?pesquisar=todasTarefas" style="text-decoration: none;"><button class="btn btn-lg btn-warning btn-block">Pesquisar todos</button></a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  </html>