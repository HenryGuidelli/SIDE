<?php 

session_start();

if (!empty($_SESSION['user']) && !empty($_POST['senha']) && !empty($_POST['senhaNova'])){
  
  require_once ('modPHP/modulos.php');


  $email = $_SESSION['user'];
  $novaSenha = $_POST['senhaNova'];
  $senha = $_POST['senha'];


  alterarSenha($email, $novaSenha, $senha);

  header("location: loginPage.php");

}else {
  echo "<h2>PREENCHA OS CAMPOS PARA ALTERAR</h2>";
}

?>



<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="LoginCss.css">

    <title>ALTERAR SENHA</title>
  </head>
  <body>

    <div>
      <h1>Altera Senha</h1>
      <form method="POST" action="">
        <input placeholder="Email" type="email" name="email" value="<?php echo $_SESSION['user']?>" disabled><br>
        <input placeholder="Senha Atual" type="password" name="senha"><br>
        <input placeholder="Nova Senha" type="password" name="senhaNova"><br>
        
        <button type="submit">ALTERAR SENHA</button>

        <a href="session.php">RETORNAR</a>

      </form>




    </div>

  </body>
</html>  