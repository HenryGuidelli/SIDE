<?php 
session_start();
  require_once('modPHP/modulos.php');

    if(isset($_POST['item']) & isset($_POST['unidade'])){

        $item = $_POST['item'];
        $uni = $_POST['unidade'];

        addItem($item, $uni);

    }else{

      echo "<h1>PREENCHA OS CAMPOS</h1><br>";

    }

    $email = $_SESSION['user'];
    echo $email;

?>

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

      <form method="POST">
        <input type="text" name="item">
        <input type="text" name="unidade">
        <input type="submit" value="Cadastrar Item">
      </form>
    </div>



    <form action="../index.html">

        <input type="submit" value="Pagina inicial">

    </form>

    <form method="POST" action="../excelEXIT/TESTES/teste01.php">

    <input type="submit" value="SEND EXCEL">
    <input type="hidden" name="email" value="<?php $_SESSION['user'] ?>">

    </form>

    </div>

    <?php pesquItem();?>

    

  </body>
</html>  


