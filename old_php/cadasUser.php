<?php
  require_once('modPHP/modulos.php');
  require_once('modPHP/varRay.php');

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $goTO = $goTO['cadFeito'];
}
  




  if (!empty($nome) && !empty($email) && !empty($senha)) {

    
    if(cadUser($nome, $email, $senha) == TRUE){      

      echo "Cadastro realizado";

      echo "<meta http-equiv='refresh' content='0;url=loginPage.php'>";

      
    }else {
      echo "<h2>EMAIL JÀ ESTÁ EM USO</h2>";
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
        <input type="email" placeholder="Email" name="email">
        <input type="text" placeholder="Nome" name="nome">
        <input type="password" placeholder="Senha" name="senha">

        <button type="submit">CRIAR CONTA</button>

        <a href="loginPage.php">JÁ TENHO CONTA</a>
        <a href="recuperarSenha.php">ESQUECI A SENHA</a>

      </form>

    </div>

  </body>
</html> 