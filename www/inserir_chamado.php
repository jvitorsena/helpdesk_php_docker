<?php
   require('conexao.php');

   $_varusu = $_POST['txtusuario'];
   $_varsen = $_POST['txtsenha'];


  $sql = "select * from tbusuarios where descricao_usuario='$_varusu' and descricao_senha='$_varsen'";

  $resultado = mysqli_query($con, $sql);

  $linha = mysqli_num_rows($resultado);

  if ($linha == 1)
  {
  	   $_SESSION['usu'] = $_varusu;

   	   header('location:home.php');

  }
  else
  {

  	echo "erro";
  }

  
  

?>