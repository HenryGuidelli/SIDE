<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">

    <title>addItem</title>
  </head>
  <body>

  <ul>
    <li><a href=""><b>INICIO</b></a></li>
    <li><a href="cadItem.php"><b>CADASTRAR ITENS</b></a></li>
    <li><a href="estoque.php"><b>ESTOQUE</b></a></li>
    <li><a href="rel.php"><b>RELATÓRIOS</b></a></li>
    <li style="float:right"><a class="active" href="loginPage.php"><b>SAIR</b></a></li>
    <li style="float:right"><a href="perfil.php"><b>PERFIL</b></a></li>

  </ul>







    
  </body>
</html>  

<?php
  // unset($_SESSION['page']);
  $_POST['page'] = 0; 
?>