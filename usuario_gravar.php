<?php
    require_once('variaveis.php'); //Faz a ligação com a outra pagina
    require_once('conexao.php');

    $nome = $_POST["inputNome"];
    $email = $_POST["inputEmail"];
    $senha = $_POST["inputPassword"];
    $id = $_POST["inputIdUsuario"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio SysPacientes</title>
</head>
<body>
    <?php 
        echo("Nome: ".$nome);
        echo("<hr>"); 
        echo("E-mail: ".$email);
        echo("<hr>"); 
        echo("Senha: ".$senha);
        echo("<hr>"); 
        echo("ID: ".$id);
    ?>
</body>
</html>