<?php

$servidor = "127.0.0.1";
$banco = "bdhelpdesk";
$usuario = "root";
$senha = "root";

// Cria a string de conexão
$con = mysqli_connect($servidor, $usuario, $senha, $banco);

// verificamos a nossa conexão
if (!$con)
  {
  	die("Conexão falhou" . mysqli_connect_error());
  }

  /*echo "Tudo ok";

  mysqli_close($conexao); //Fecha */

?>