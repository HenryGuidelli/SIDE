<?php
     Class Conexao{
    
     function conectar(){

      $host= "127.0.0.1";
      $dbname= "EstoqueTcc";
      $user = "root";
      $password = "";
      $dbh;

       $this->dbh = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
       return $this->dbh;
     }
    }
?>
