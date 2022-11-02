<?php 
session_start();
  require_once('modPHP/modulos.php');
  
  $validade = date('d/m/Y', strtotime($_POST['vencimento']));


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

  <?php if(!empty($_POST['prod']) & !empty($_POST['vencimento'])) { $prod = $_POST['prod']; addEstoque($prod, $validade);}else{ echo"<h3>PREENCHA OS CAMPOS</h3>";}?>

      <form method="POST">
        <select type="text" name="prod">
        <?php prodAlim(); ?>
        </select>
        <input type="date" name="vencimento" value="<?php echo date('d-m-Y'); ?>">

        <input type="submit" value="Cadastrar Item">
      </form>
    </div>

    </div>

    <?php 

 



    
    pesquEstoque();
    
    
    ?>

    

  </body>
</html>  