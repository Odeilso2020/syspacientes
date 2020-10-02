<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa = $_GET['idPessoa'];

    
   //echo $idPessoa;
   if(strlen($idPessoa) > 0){
      $sql = "DELETE FROM pessoas WHERE idPessoa =" . $idPessoa;
      mysqli_query($conexao_bd, $sql);
      echo("entrou");
   }
   else{
      // erro
      echo("erro");
   }
   mysqli_close($conexao_bd);
   echo($idPessoa);
   //header("location:pessoas_list.php");
?>