<?php
    require_once('variaveis.php');
    require_once('conexao.php');

    $id_usuario = $_GET["id_usuario"];
    $nome_usuario = "";

    $sql = "SELECT nome FROM usuarios WHERE id=" . $id_usuario;
    $resp = mysqli_query($conexao_bd, $sql);
    if($rows=mysqli_fetch_row($resp))
    {
        $nome_usuario = $rows[0];
    }
    mysqli_close($conexao_bd);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <!-- CSS only -->
        <link rel="stylesheet" href="css/bootstrap.css"/>
        
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <style>
            body {
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .navbar {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(245, 245, 245); border: 1px solid rgb(231, 231, 231); border-radius: 5px;">
                    <a class="navbar-brand" href="#">SysPacientes</a>
                    <!-- Menu para Mobile -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disable" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li>
                        </ul>
                        <!--
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form> -->
                        <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item active"><a class="nav-link" href="./">Default <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="../navbar-static-top/">Static top</a></li>
                        <li class="nav-item"><a class="nav-link" href="../navbar-fixed-top/">Fixed top</a></li>
                    </ul>
                    </div>
                </nav>
                <div class="jumbotron">
                    <h1><?php echo "Usuário: " . $nome_usuario ?></h1>
                    <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>