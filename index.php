<?php
    //echo "Boa Noite!";
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
    
    mysqli_close($con);
?>