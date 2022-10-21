<?php 

  session_start();

  require_once('../modPHP/modulos.php');


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $_SESSION['user'] = $email;
    $_SESSION['senha'] = $senha;
  
    echo $_SESSION['user'];
    echo $_SESSION['senha'];

    $verify = verifyUser($email, $senha);

    if($verify == TRUE){

      echo "<meta http-equiv='refresh' content='0;url=../session.php'>";

    }else {
  
      echo "<meta http-equiv='refresh' content='0;url=../loginPage.php'>"; 

    }
    
    session_write_close();

?>  