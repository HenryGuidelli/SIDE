<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginCss.css">
    <title>Login</title>
  </head>
<body class="bg-login">

<div>

    <h1>LOGIN</h1>

        <form method="POST" action="php/login.php" >
            <input placeholder="Email" type="email" name="email">
            <br>
            <input type="password" placeholder="Password" name="senha"/>
            <br>

            <button type="submit">ENTRAR</button>
            <br>
            <a href="cadasUser.php">CRIAR CONTA</a>
            
            <a href="recuperarSenha.php">ESQUECI A SENHA</a>

        </form>

  </div>

</body>
</html>
