<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   //$id_usuario = $_GET["id_usuario"];
   
   //recuperando dados da sessao
   $id_usuario   = $_SESSION["id_usuario"];   
   $tipoAcesso   = $_SESSION["tipo_acesso"]; 
   $nome_usuario = "";
   //$idPessoa = $_SESSION["idPessoa"];

   //validar se codigo do usuario esta na sesao
   if(strlen($id_usuario) == 0){
      header("location: index.php");
   }

   $sql = "SELECT nome FROM usuarios WHERE id = " . $id_usuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nome_usuario = $rows[0];
   }   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - Lista de Pessoas</title>
    <link rel="icon" href="img/favicon/favicon2.ico">
    <script src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/sweetalert2.js"></script>
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container-fluid" >

      <!-- Static navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="admin.php">SysPacientes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php 
            if($tipoAcesso != 3) {
            ?>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown09">
                  <a class="dropdown-item" href="pessoas_list.php">Cadastro de pessoas</a>
                  <a class="dropdown-item" href="usuario_list2.php">Cadastro de usuários</a>                
                  <a class="dropdown-item" href="#">Cadastro de pacientes</a>
                </div>
              </li>
            <?php
            }
            ?>            
          </ul>  
          <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo($nome_usuario); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="minhaconta.php">Minha conta</a>
                <a class="dropdown-item" href="logout.php">Sair</a>                 
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron jumbotron-fluid">
        <h1>Lista de Pessoas</h1>
        <hr>
        <table class="table">
            <thead>
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NOME</th>
                  <th scope="col">ENDEREÇO</th>
                  <th scope="col">Nº</th>
                  <th scope="col">COMPLEMENTO</th>
                  <th scope="col">CIDADE</th>
                  <th scope="col">ESTADO</th>
                  <th scope="col">CEP</th>
                  <th scope="col">DATA</th>
                  <!--<th scope="col">TEL</th>-->
                  <th scope="col">CEL</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">...</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql = "SELECT  *FROM pessoas ORDER BY idPessoa";
                  $resp = mysqli_query($conexao_bd, $sql);
                  while($rows=mysqli_fetch_row($resp)){
                     $idPessoa    = $rows[0];
                     $nome        = $rows[1];
                     $endereco    = $rows[2];
                     $numero      = $rows[3];
                     $complemento = $rows[4];
                     $cidade      = $rows[5];
                     $estado      = $rows[6];
                     $cep         = $rows[7];
                     $data        = $rows[8];
                     $telefone    = $rows[9];
                     $celular     = $rows[10];
                     $email       = $rows[11];




                     echo("<tr>");
                     echo("<th scope='row'>$idPessoa</th>");
                     echo("<td>$nome</td>");
                     echo("<td>$endereco</td>");
                     echo("<td>$numero</td>");
                     echo("<td>$complemento</td>");
                     echo("<td>$cidade</td>");
                     echo("<td>$estado</td>");
                     echo("<td>$cep</td>");
                     echo("<td>$data</td>");
                     //echo("<td>$telefone</td>");
                     echo("<td>$celular</td>");
                     echo("<td>$email</td>");
                     echo("<td>");
                     if($tipoAcesso == 1){
                        echo("<a class='btn btn-lg btn-success' href='pessoas.php?idPessoa=$idPessoa' role='button'>Editar</a>&nbsp;");
                        
                        echo("<a class='btn btn-lg btn-danger'  href='javascript:excluirPessoas($idPessoa)' role='button'>Excluir</a>");                    
                     }else{
                       echo("-");
                     }
                     echo("</td>");
                     echo("</tr>");
                  } 
               ?>
            </tbody>
        </table>  
        <br>
        <?php
        if($tipoAcesso == 1){
          echo("<a class='btn btn-lg btn-primary' href='pessoas.php' role='button'>Nova Pessoa</a>");
        }
        ?>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-1.12.4.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <?php
    mysqli_close($conexao_bd);
    ?>
    <script type="text/javascript">
      function excluirPessoas(idPessoa){
       
        Swal.fire({
          title: 'Deseja realmente exluir?',
          text: "Você deseja realmente excluir esta pessoa!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'SIM',
          cancelButtonText: 'NÃO'
        }).then((result) => {
          if (result.value) {
            window.location.href = "pessoas_excluir.php?idPessoa=" + idPessoa;
          }
        })
      }
    </script>
</body>
</html>