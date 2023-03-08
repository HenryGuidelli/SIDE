<?php 
require_once 'scripts/php/modules_users/crud_user.php';

// Classe de User global

Class gUser{

    private $nome, $email, $password , $vtf, $adm;

    public function vUser($email){
        $gcUser = new User;
        $gcUser->verUser($email);
    }

    public function vSenha($email, $password){
        $gcUser = new User;
        $gcUser->verSenha($email, $password);
    }

    public function cUser($nome, $email, $password){
        $gcUser = new User;
        $gcUser->cadUser($nome, $email, $password);
    }

    public function aSenha($email, $password, $nPassword){
        $gcUser = new User;
        $gcUser->altSenha($email, $password, $nPassword);
    }

    public function rSenha($email){
        $gcUser = new User;
        $gcUser->recSenha($email);
    }

    public function rUser($email, $password){
        $gcUser = new User;
        $gcUser->remUser($email, $password);
    }

}



?>