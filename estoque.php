<?php 
session_start();
  require_once('modPHP/modulos.php');
  
  $estoque = new Estoque;


$venci = date('d/m/Y', strtotime($_POST['venci']));


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
    <li><a href="cadItem.php"><b>INSERIR ITENS</b></a></li>
    <li value="<?php $_SESSION['user']?>"><a href="excelEXIT/teste01.php"><b>RELATÓRIOS</b></a></li>
    <li><a href=""><b></b></a></li>
    <li style="float:right"><a class="active" href="loginPage.php"><b>Sair</b></a></li>
  </ul>

  <?php if(!empty($_POST['prod']) & !empty($_POST['venci'])) { $prod = $_POST['prod'];}else{ echo"<h3>PREENCHA OS CAMPOS</h3>";}?>

      <form method="POST">
        <select type="text" name="prod">
        <?php prodAlim(); ?>
        </select>
        <input type="number" name="qtd" min= "0">
        <input type="date" name="venci" value="<?php $venci?>">

        <input type="submit" value="Cadastrar Item">
      </form>

      <table>
      <tr>
      <td>Nome</td>
      <td>Unidade</td>
      <td>Validade</td>
      <td>Quantidade</td>
      </tr>

      <?php 

          $lista = $estoque->listEstoque();

          if(count($lista) > 0){
            for ($i=0; $i < count($lista); $i++) { 
              echo "<tr>";
              foreach ($lista[$i] as $C => $L) {

                if($C != "codAli"){

                  echo "<td>".$L."</td>";

                }
              }
              echo "<td><a href=''>EDITAR</a> <a href=''>EXCLUIR</a></td>";
              echo "</tr>";
            }
              echo "</table>";
          }
          
      ?>

  </body>
</html>  