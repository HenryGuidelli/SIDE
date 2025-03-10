<?php 
require_once('../excelEXIT/gerExcel.php');
require_once(realpath(dirname(__FILE__)  . '/model/Database.class.php'));
$email = '';
relatorios($email);
?>
