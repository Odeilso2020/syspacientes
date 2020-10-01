<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa    = $_POST["inputIdPessoa"];
   $nomePessoa  = $_POST["inputNomePessoa"];
   $endereco    = $_POST["inputEndereco"];
   $numero      = $_POST["inputNumero"];
   $complemento = $_POST["inputComplemento"];
   $cidade      = $_POST["inputCidade"];
   $estado      = $_POST["inputEstado"];
   $cep         = $_POST["inputCep"];
   $datanasc    = $_POST["inputData"];
   $telefone    = $_POST["inputTelefone"];
   $celular     = $_POST["inputCelular"];  
   $emailPessoa = $_POST["inputEmail"];

   
      $sql = "INSERT INTO pessoas( nome, endereco, numero, complemento, cidade, estado, cep, datanascimento, telefone, celular, email)
      VALUES('$nomePessoa', '$endereco', '$numero','$complemento', '$cidade', '$estado',  '$cep', '$datanasc', '$telefone', '$celular', '$emailPessoa')";
      mysqli_query($conexao_bd, $sql);
   

   mysqli_close($conexao_bd);
   header("location:pessoas_list.php");
   
?>