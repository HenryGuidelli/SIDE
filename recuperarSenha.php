<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="cssOut/style.css">

    <title>testePHP</title>
  </head>
  <body class="bg-emerald-700">

    <div>
      <form method="POST">
      Email:  <input type="email" name="email"><br>
        <!-- : <input type="email" name=""><br> -->
        
        <input type="submit" value="RECUPERAR">
      </form>
    </div>

  </body>
</html>  


<?php
  require_once('modPHP/modulos.php');

  $email = $_POST['email'];

  $recSenha = recuperarSenha($email);


  if($recSenha == TRUE){
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
  }
  
 


?>