<?php 
session_start();
  require_once('modPHP/modulos.php');
  $email = $_SESSION['user'];
  $estoque = new Estoque;
  $sendMail = new sendMAIL;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">

    <title>ESTOQUE</title>
  </head>
  <body>

  <ul>
    <li><a href="session.php"><b>PAGINA INICIAL</b></a></li>
    <li><a href="cadItem.php"><b>CADASTRAR ITENS</b></a></li>
    <li><a href="estoque.php"><b>ESTOQUE</b></a></li>
    <li><a href=""><b></b></a></li>
    <li style="float:right"><a class="active" href="loginPage.php"><b>Sair</b></a></li>
  </ul>
  
      <table>
      <tr>
      <td>Nome</td>
      <td>Unidade</td>
      <td>peso(Kg)</td>
      <td>Validade</td>
      <td>Quantidade</td>
      <td>Status</td>
      </tr>

      <?php 
        $estoque->estoqueRel();
      ?>

  </body>
</html>
<?php 
    // $sendMail->rel();
?>