<?php
     Class Conexao{
    
     function conectar(){

      $host= "127.0.0.1";
      $dbname= "estoquetcc";
      $user = "root";
      $password = "z01oxm313";
      $dbh;

       $this->dbh = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
       return $this->dbh;
     }
    }
?>