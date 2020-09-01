<?php
    session_start(); // Inicia a sessão pois ela esta ativa
    session_destroy(); // Destroi a sessão
    header("location: index.php"); // Reencaminha para o index
?>