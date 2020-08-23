<?php
    //echo "Boa Noite!";

    // Conexão com BD
    /*
    $con = mysqli_connect(
    "localhost",
    "root",
    "123odeilso@", 
    "syspacientes");
    if(!$con){
        echo "Error: ".PHP_EOL;
        exit;
    }
    echo "Conectou!!!";
    echo "<br>";
    echo "Informações do host: " . 
        mysqli_get_host_info($con);
    
    mysqli_close($con); */

    // $_GET pega o que passou pela URL
    // $_POST pega informação dos componentes das paginas

    $nome = $_GET["nome"];
    $sobrenome = $_GET["sobrenome"];
    echo "O Nome é: ".$nome." ".$sobrenome;
?>