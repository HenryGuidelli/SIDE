
<?php 
session_start();
  require_once('../modPHP/modulos.php');


    $item = $_POST['item'];

    $email = $_SESSION['user'];

    if(empty($item)){
        echo "<h1>COLOQUE O NOME DO ITEM</h1><br>";
    }else{
        pesquItem($item);
    }
    
    $itemP = $_SESSION['itemP'];
    $emailR = $_SESSION['emailR'];
    $nomeUSR = $_SESSION['nomeUSR'];

    echo "<h1><br>O item $itemP foi cadastrado pelo usuario $nomeUSR com o email $emailR<br></h1>";

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/style.css">

    <title>addItem</title>
  </head>
  <body>

      <form method="POST">
        <input type="text" name="item">
        <input type="submit" value="PESQUISAR ITEM">
      </form>
    </div>

    <form action="../index.html">

        <input type="submit" value="Pagina inicial">
      </form>
    </div>

  </body>
</html>  



