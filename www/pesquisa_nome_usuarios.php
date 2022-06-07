<?php
   session_start();	

   require('conexao.php');

 /*  if (($_varusu=='doctum@doctum.edu.br') && ($_varsen=='123456'))
   {
   	   $_SESSION['usu'] = $_varusu;
   	   header('location:home.php');
   }*/
   $_varnomusu = $_POST['txtnome'];

//  $sql = "select * from tbusuarios order by nome_usuario";

  $sql = "select * from tbusuarios where nome_usuario='$_varnomusu'";


  $resultado = mysqli_query($con, $sql);

  $linha = mysqli_num_rows($resultado);

  if ($linha > 0)
  {
  	  while ($linha = mysqli_fetch_assoc($resultado))
  	  {
  	  	echo $linha['codigo_usuario'] . " - ";
  	  	echo $linha['nome_usuario'] . "<br>";
  	  	echo $linha['descricao_usuario'] . "<br>";
  	  	echo $linha['tipo_usuario'] . "<br><br><br><br>";
  	  }

  }
  else
  {
  	echo "nenhum registro";
  }

  
  

?>