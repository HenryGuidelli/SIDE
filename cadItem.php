<?php 
session_start();
  require_once('modPHP/modulos.php');
  
  $produto = new Produto;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">

    <title>Cad Prod</title>
  </head>
  <body>

  <ul>
    <li><a href="session.php"><b>PAGINA INICIAL</b></a></li>
    <li><a href="estoque.php"><b>ESTOQUE</b></a></li>
    <li><a href="rel.php"><b>RELATÓRIOS</b></a></li>
    <li><a href=""><b></b></a></li>
    <li style="float:right"><a class="active" href="loginPage.php"><b>Sair</b></a></li>
  </ul>

    <?php 

      if(!empty($_POST['item']) && !empty($_POST['unidade'])) { 

        $prod = addslashes($_POST['item']);
        $unidade = addslashes($_POST['unidade']);

        $produto->addProd($prod, $unidade);

      }else { 
        echo"<h3>PREENCHA OS CAMPOS</h3>";
      }

    ?>

      <form method="POST">

        <input class="Cap" type="text" name="item">
        <select type="text" name="unidade">
        <option value=>Un</option>
        <option value="Lt">L</option>
        <option value="Kg">Kg</option>
        </select>

        <input type="submit" value="Cadastrar Item">

      </form>

      <table>
      <tr>
      <td>Nome</td>
      <td>Unidade</td>
      </tr>

      <?php 
        $produto->listProd();
      ?>

  </body>
</html>

<?php 

  if(!empty($_GET['cod'])){
    $cod = addslashes($_GET['cod']);
    $produto->delProd($cod);
    header("location: cadItem.php");
    }
?>