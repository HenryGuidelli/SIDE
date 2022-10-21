<?php
  require_once('modPHP/modulos.php');
  require_once('modPHP/varRay.php');

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $goTO = $goTO['cadFeito'];
  

  if (!empty($nome) && !empty($email) && !empty($senha)) {

    
    if(cadUser($nome, $email, $senha) == TRUE){      

      echo "Cadastro realizado";

      echo "<meta http-equiv='refresh' content='0;url=loginPage.php'>";

      
    }else {
      echo "<h1>EMAIL JÀ ESTÁ EM USO</h1>";
    }

  }else {
    echo 'Preencha os campos obrigatórios';

  }



?>
   

   <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">

    <title>CADASTRO USER</title>
  </head>
  <body>

    <div>
      <form method="POST">
        Nome:  <input type="text" name="nome"><br>
        Email: <input type="email" name="email"><br>
        Senha: <input type="password" name="senha"><br>
        <input type="submit" value="Criar conta">
      </form>

      <form method="POST" action="recuperarSenha.php">
        <input type="submit" value="Esqueci a senha">
      </form>

      <form method="POST" action="index.php">
        <input type="submit" value="Já tenho conta">
      </form>

    </div>

  </body>
</html> 