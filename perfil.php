<?php 
session_start();
include_once('modPHP/bdConnect.php');
require_once ('modPHP/modulos.php');

$objeto = new Conexao;
$dbh = $objeto->conectar();

$email = $_SESSION['user'];

$cmd = $dbh->prepare("SELECT nome FROM Usuario WHERE email='$email'");
$cmd->execute();
$nomeT = $cmd->fetch();
$nome = $nomeT[0];

if(!empty($_POST['senha']) && verifyUser($email, $_POST['senha']) == TRUE ){
  header("location: alterarSenha.php");
}else {
  echo "<h2>COLOQUE A SENHA ATUAL PARA ALTERAR</h2>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginCss.css">
    <title>Login</title>
  </head>
<body>

<div>

    <h1>PERFIL</h1>

        <form method="POST">
            <input placeholder="Email" type="email" name="email" value="<?php echo $email;?>" disabled >
            <input placeholder="Nome" type="text" name="nome" value="<?php echo $nome;?>" disabled>
            <input placeholder="Senha Atual" type="password" name="senha">

            <button type="submit">ALTERAR SENHA</button>

            <a href="session.php">RETORNAR</a>

        </form>

  </div>

</body>
</html>