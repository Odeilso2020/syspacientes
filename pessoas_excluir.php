<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa = $_GET['idPessoa'];

    
   //echo $idPessoa;
   if(strlen($idPessoa) > 0){
      $sql = "DELETE FROM pessoas WHERE id =" .$idPessoa;
      mysqli_query($conexao_bd, $sql);
   }
   else{
      // erro
   }
   mysqli_close($conexao_bd);
   echo($idPessoa);
   //header("location:pessoas_list.php");
?>