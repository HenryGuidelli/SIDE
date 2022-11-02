<?php 
session_start();
  require_once('modPHP/modulos.php');
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

  <ul>
    <li><a href="session.php"><b>PAGINA INICIAL</b></a></li>
    <li><a href="estoque.php"><b>ESTOQUE</b></a></li>
    <li value="<?php $_SESSION['user']?>"><a href="excelEXIT/teste01.php"><b>RELATÓRIOS</b></a></li>
    <li><a href=""><b></b></a></li>
    <li style="float:right"><a class="active" href="loginPage.php"><b>Sair</b></a></li>
  </ul>

  <?php if(!empty($_POST['item']) & !empty($_POST['unidade'])) { $item = $_POST['item']; $uni = $_POST['unidade']; addItem($item, $uni);}else{ echo"<h3>PREENCHA OS CAMPOS</h3>";}?>

      <form method="POST">
        <input class="Cap" type="text" name="item">
        <select type="text" name="unidade">
        <option value=>Un</option>
        <option value="Lt">L</option>
        <option value="Kg">Kg</option>
  </select>
        <input type="submit" value="Cadastrar Item">
      </form>
    </div>

    </div>

    <?php pesquItem();?>

    

  </body>
</html>  


