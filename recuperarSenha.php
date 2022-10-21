<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="recuperar.css">

    <title>testePHP</title>
  </head>
  <body>

    <div>
      <h1>Recuperar senha</h1>
      <form method="POST">
      <input type="email" placeholder="Email" name="email"><br>
        <!-- : <input type="email" name=""><br> -->
        
      <button type="submit">Recuperar</button>
      </form>
    </div>

  </body>
</html>  


<?php


  require_once('modPHP/modulos.php');


  

  if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $recSenha = recuperarSenha($email);
    return TRUE;
  }else {
    $recSenha = FALSE;
  }

  if($recSenha == TRUE){
    echo "<meta http-equiv='refresh' content='0;url=loginPage.php'>";
  }
  
 


?>