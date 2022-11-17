<?php 
require_once('../excelEXIT/gerExcel.php');
require_once(realpath(dirname(__FILE__)  . '/model/Database.class.php'));
$email = 'henryguidelli@yahoo.com';
relatorios($email);
?>