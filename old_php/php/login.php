<?php 

  session_start();

  require_once('../modPHP/modulos.php');


    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $_SESSION['user'] = $email;
    $_SESSION['senha'] = $senha;

    $verify = verifyUser($email, $senha);

    if($verify == TRUE){

      header("location: ../session.php");

    }else {

      header("location: ../loginPage.php");

    }
    
    session_write_close();

?>  