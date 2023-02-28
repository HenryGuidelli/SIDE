<?php 
session_start();
  require_once('modPHP/modulos.php');
  
  $estoque = new Estoque;
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
    <li><a href="rel.php"><b>RELATÓRIOS</b></a></li>
    <li style="float:right"><a class="active" href="loginPage.php"><b>Sair</b></a></li>
  </ul>

      <div class='estoque'>
      
      <?php 

        if(!empty($_POST['prod']) && !empty($_POST['venci']) && !empty($_POST['qtd']) && !empty($_POST['peso'])) { 

          $prod = addslashes($_POST['prod']);
          $venci = addslashes(date('d/m/Y', strtotime($_POST['venci'])));
          $qtd = addslashes($_POST['qtd']);
          $peso = addslashes($_POST['peso']);

          $estoque->addEstoque($prod, $venci, $qtd, $peso);

        }else { 
          echo"<h3>PREENCHA OS CAMPOS</h3>";
        }

        if(!empty($_GET['codA'])){
          $codAli = addslashes($_GET['codA']);
        if($estoque->upEstoque($codAli) == TRUE){
          header("location: estoque.php");
          }else {
            echo "<h3>FORA DE ESTOQUE</h3>";
          }
        }

      ?>

      <form method="POST">
        <select type="text" name="prod">
        <?php prodAlim(); ?>
        </select>
        <input placeholder="QUANTIDADE" type="number" name="qtd" min= "0">
        <input placeholder="PESO" type="float" name="peso">
        <input placeholder="DATA" type="date" name="venci">


        <button type="submit"><b>INSERIR ITEM</b></button>
      </form>

      </div>

      <table>
      <tr>
      <td>Nome</td>
      <td>Unidade</td>
      <td>peso(Kg)</td>
      <td>Validade</td>
      <td>Quantidade</td>
      <td>Status</td>
      <td>Ações</td>
      </tr>

      <?php 
        $estoque->listEstoque();
      ?>

  </body>
</html>

<?php 

  if(!empty($_GET['codAli'])){
    $codAli = addslashes($_GET['codAli']);
    $estoque->delEstoque($codAli);
    header("location: estoque.php");
    }

?>
