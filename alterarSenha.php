<?php 
session_start();

require_once ('modPHP/modulos.php');
require_once ('modPHP/varRay.php');


$email = $_SESSION['user'];
$novaSenha = $_POST['senhaNova'];
$senha = $_POST['senha'];


alterarSenha($email, $novaSenha, $senha);

echo "<meta http-equiv='refresh' content='0;url=loginPage.php'>";

session_write_close();



?>