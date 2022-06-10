<?php
require("verificar_sessao.php");
require('conexao.php');

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'inserir') {
  $titulo = $_POST['titulo'];
  $categoria = $_POST['categoria'];
  $descricao = $_POST['descricao'];

  $sql = "insert into `tbchamados` (`titulo_chamado`, `descricao_chamado`, `codigo_categoria`) VALUES ('{$titulo}', '{$descricao}', '{$categoria}')";


  header('Location: abrir_chamado.php');

  $resultado = mysqli_query($con, $sql);

  $resultado->exec;

  // echo $titulo;
  // echo $categoria;
  // echo $descricao;

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
            Abertura de chamado
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">

                <form method="POST" action="abrir_chamado.php?acao=inserir">
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                  </div>

                  <div class="form-group">
                    <label>Categoria</label>
                    <select class="form-control" name="categoria">
                      <?php
                      while ($linha = mysqli_fetch_assoc($resultado)) {
                      ?>
                        <option value="<?php echo $linha['codigo_categoria'] ?>">
                          <?php echo $linha['nome_categoria'] ?>
                        </option>

                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" rows="3" name="descricao" required></textarea>
                  </div>

                  <div class="row mt-5">


                    <div class="col-6">
                      <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
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