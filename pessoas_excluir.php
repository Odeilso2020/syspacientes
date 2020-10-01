<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa = $GET['idPessoa'];

    
   //echo $idPessoa;
   //verifico se é vazio:
  
      $sql = "DELETE FROM pessoas WHERE id =" .idPessoa ;
      mysqli_query($conexao_bd, $sql);
  
   mysqli_close($conexao_bd);
   header("location:pessoas_list.php");
?>