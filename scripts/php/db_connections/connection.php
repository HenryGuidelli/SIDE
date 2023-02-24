<?php

require_once 'scripts/php/config.php';

     Class Conexao{

        private static $instancia;

        public static function getInstancia(){

            self::$instancia = new PDO('mysql:host='.DB_host.';port='.DB_port.';dbname='.DB_name, DB_user, DB_password);
            return self::$instancia;
            
        }
    }
?>