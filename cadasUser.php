<?php
  require_once('modPHP/modulos.php');
  require_once('modPHP/varRay.php');

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $goTO = $goTO['cadFeito'];
}else {
  
}



  if (!empty($nome) && !empty($email) && !empty($senha)) {

    
    if(cadUser($nome, $email, $senha) == TRUE){      

      echo "Cadastro realizado";

      echo "<meta http-equiv='refresh' content='0;url=loginPage.php'>";

      
    }else {
      echo "<h1>EMAIL JÀ ESTÁ EM USO</h1>";
    }

  }else {
    echo '<h2><b>Preencha os campos obrigatórios</b></h2>';

  }



?>
   

   <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="LoginCss.css">

    <title>CADASTRO USER</title>
  </head>
  <body>

    <div>
      <h1>Criar conta</h1>
      <form method="POST">
        <input type="email" placeholder="Email" name="email"><br>
        <input type="text" placeholder="Nome" name="nome"><br>
        <input type="password" placeholder="Senha" name="senha"><br>
        <input type="submit" value="Criar conta">
      </form>

      <form method="POST" action="recuperarSenha.php">
        <input type="submit" value="Esqueci a senha">
      </form>

      <form method="POST" action="loginPage.php">
        <input type="submit" value="Já tenho conta">
      </form>

    </div>

  </body>
</html> 