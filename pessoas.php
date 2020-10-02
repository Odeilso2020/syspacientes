<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idPessoa = $_GET['idPessoa'];

   //recuperando dados da sessao
   $id_usuario   = $_SESSION["id_usuario"];
   $tipoAcesso   = $_SESSION["tipo_acesso"];    
   $nome_usuario = "";
   
   $sql = "SELECT nome FROM usuarios WHERE id = ".$id_usuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nome_usuario = $rows[0];
   }

   //verificar se o parametro de id de edição está vazio:   
   if(strlen($idUsuario)==0) 
      $idUsuario = 0;

      $nomePessoa  = "";
      $endereco    = "";
      $numero      = "";
      $complemento = "";
      $cidade      = "";
      $estado      = "";
      $cep         = ""; 
      $datanasc    = "";
      $telefone    = "";
      $celular     = "";  
      $emailPessoa = "";

   if($idPessoa != 0){
      $sql = "SELECT u.nome, u.endereco, u.numero, u.complemento, u.cidade, u.estado, u.cep, u.datanascimento, u.telefone, u.celular, u.email  
              FROM pessoas 
              WHERE u.idPessoa = " . $idPessoa;
      $resp = mysqli_query($conexao_bd, $sql);
      if($rows=mysqli_fetch_row($resp)){
         $nomePessoa  = $rows[0]; 
         $endereco    = $rows[1]; 
         $numero      = $rows[2]; 
         $complemento = $rows[3]; 
         $cidade      = $rows[4]; 
         $estado      = $rows[5]; 
         $cep         = $rows[6]; 
         $datanasc    = $rows[7];
         $telefone    = $rows[8];
         $celular     = $rows[9];  
         $emailPessoa = $rows[10];
      }  
   }
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - Editar usuário</title>
   <link rel="icon" href="img/favicon/favicon2.ico">
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
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
      <div class="jumbotron">
       <?php
         //if($idUsuario != 0){
           // echo("<h1>Editando a pessoa: $nomeUsuario</h1>");
         //}else{
           // echo("<h1>Cadastro de nova Pessoa:</h1>");
        // }
        ?>
        <form
            method="post"
            action="pessoas_gravar.php">
            <div class="form-group">
               <label for="inputNomePessoa">Nome da pessoa:</label>
               <input type="text" class="form-control" id="inputNomePessoa" name="inputNomePessoa" placeholder="Nome do usuário" value="<?php echo($nomePessoa); ?>">
            </div>
            <div class="form-group">
               <label for="inputEndereco">Endereço:</label>
               <input type="text" class="form-control" id="inputEndereco" name="inputEndereco" placeholder="Endereço" value="<?php echo($endereco); ?>">
            </div>
            <div class="form-group">
               <label for="inputNumero">Numero</label>
               <input type="text" class="form-control" id="inputNumero" name="inputNumero" placeholder="Numero da residência" value="<?php echo($numero);?>">
            </div>
            <div class="form-group">
               <label for="inputComplemento">Complemento</label>
               <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" placeholder="Complemento" value="<?php echo($complemento);?>">
            </div>
            <div class="form-group">
               <label for="inputCidade">Cidade</label>
               <input type="text" class="form-control" id="inputCidade" name="inputCidade" placeholder="Cidade" value="<?php echo($cidade);?>">
            </div>
            <div class="form-group">
               <label for="inputEstado">Estado</label>
               <input type="text" class="form-control" id="inputEstado" name="inputEstado" placeholder="Estado" value="<?php echo($estado);?>">
            </div>
            <div class="form-group">
               <label for="inputCep">Cep</label>
               <input type="text" class="form-control" id="inputCep" name="inputCep" placeholder="CEP" value="<?php echo($cep);?>">
            </div>
            <div class="form-group">
               <label for="inputData">Data Nascimento</label>
               <input type="date" class="form-control" id="inputData" name="inputData" value="<?php echo($datanasc);?>">
            </div>
            <div class="form-group">
               <label for="inputTelefone">Telefone</label>
               <input type="text" class="form-control" id="inputTelefone" name="inputTelefone" placeholder="Telefone" value="<?php echo($telefone);?>">
            </div>
            <div class="form-group">
               <label for="inputCelular">Celular</label>
               <input type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="Celular.." value="<?php echo($celular);?>">
            </div>
            <div class="form-group">
               <label for="inputEmail">Email</label>
               <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="exemplo@email.com" value="<?php echo($emailPessoa);?>">
            </div>
       
            <input type="hidden" id="inputIdPessoa" name="inputIdPessoa" value="<?php echo($idPessoa) ?>">
            <button type="submit" class="btn btn-success">Gravar</button>&nbsp;
            <a href="pessoas_list.php" class="btn btn-warning" role="button">Retornar</a>
         </form>
      </div>
    </div>



</body>
<?php
//encerrando a conexao com mysql
mysqli_close($conexao_bd);
?>
</html>