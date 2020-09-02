<?php
    require_once('variaveis.php'); //Faz a ligação com a outra pagina
    require_once('conexao.php');

    $nome = $_POST["inputNome"];
    $email = $_POST["inputEmail"];
    $senha = $_POST["inputPassword"];
    $id = $_POST["inputIdUsuario"];

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' where id = '$id'";
    $resp = mysqli_query($conexao_bd, $sql);
    mysqli_close($conexao_bd);
    
    header("location: admin.php"."<script>alert('Alteração Concluida!');</script>");
?>