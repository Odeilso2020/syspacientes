<?php
    require_once('variaveis.php'); //Faz a ligação com a outra pagina
    require_once('conexao.php');

    $email = $_POST["inputEmail"];
    $senha = $_POST["inputPassword"];
    $validou = false;
    $erro = "Nenhuma credencial encontrada!";

    //Validar Login
    $sql = "SELECT id, email, senha FROM usuarios WHERE email = '$email'";
    $resp = mysqli_query($conexao_bd, $sql);
    if($rows=mysqli_fetch_row($resp)) //Meio que criando um array com as informações
    {
        if($senha == $rows[2])
        {
            $errou = "";
            $validou = true;
        }else
        {
            $erro = "Credenciais inválidas!";
            $validou - false;
        }
    }
    mysqli_close($conexao_bd);

    //Exibir ou Retornar
    if($validou)
    {
        echo "<hr>";
        echo "E-mail: ".$email."<br>";
        echo "Senha: ".$senha;
    }else{
        header("location:index.php?erro=$erro");
    }
?>