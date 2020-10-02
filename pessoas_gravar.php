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

   if($idPessoa != 0){
         //atualizar
         $sql = "UPDATE pessoas SET 
                  nome = '$nomePessoa', 
                  endereco = '$endereco',
                  numero = '$numero',
                  complemento = '$complemento',
                  cidade = '$cidade',
                  estado = '$estado',
                  cep = '$cep',
                  datanascimento = '$datanasc',
                  telefone = '$telefone',
                  celular = '$celular',
                  email = '$emailPessoa'
                 WHERE idPessoa = ". $idPessoa;  
            echo("entrou");
            echo($idPessoa);
      } else {
         $sql = "INSERT INTO pessoas( nome, endereco, numero, complemento, cidade, estado, cep, datanascimento, telefone, celular, email)
         VALUES('nome', '$endereco', '$numero','$complemento', '$cidade', '$estado',  '$cep', '$datanasc', '$telefone', '$celular', '$emailPessoa')";
     }
      
      mysqli_query($conexao_bd, $sql);
  

   mysqli_close($conexao_bd);
   //header("location:pessoas_list.php");
   
?>