<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TELA INICIAL</title>
  </head>
<body class="bg-login">

<h1>SIDE</h1>

<div>


        <form method="POST" action="php/login.php" >
          <!-- Email input -->
          <div>
            <input
              placeholder="Email address" type="email" name="email"><br>
          </div>

          <!-- Password input -->
          <div>
            <input
              type="password"
              placeholder="Password"
              name="senha"
            />
          </div>

            <!-- Submit button -->
        <button
            type="submit">ENTER</button>
          <div class="flex justify-between items-center mb-6">
            <div class="form-group form-check">
            <a
              href="cadasUser.php"
              >CRIAR CONTA</a>
            </div>
            <a href="recuperarSenha.php">ESQUECI A SENHA</a>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>
</html>
