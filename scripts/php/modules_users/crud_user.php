<?php
require_once 'scripts/php/db_connections/connection.php';    


Class User{

    private $nome, $email, $password , $vtf, $adm;

    public function verUser($email){
        $dbh = Conexao::getInstancia();

        $list = $dbh->query("SELECT email FROM Usuario WHERE email = '$email'");
        $list = $list->fetch(PDO::FETCH_ASSOC);

        if(empty($list) == TRUE){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function verSenha($email, $password){
        $dbh = Conexao::getInstancia();

        if(self::verUser($email) == TRUE){
            $list = $dbh->query("SELECT senha FROM Usuario WHERE email = '$email'");
            $hash = $list->fetch();

            if(strlen($hash[0]) != 13){
                if(password_verify($password, $hash[0])){
                    return TRUE;
                }else {
                    return FALSE;
                }
            }else {
                if($password == $hash[0]){
                    return TRUE;
                }else {
                    return FALSE;
                }
            }
        }else {
            echo "Email não encontrado";
        }
    }

    public function cadUser($nome, $email, $password,){
        $dbh = Conexao::getInstancia();
      
        if(self::verUser($email) == FALSE){

            $options = ['cost' => 12,];
            $hash = password_hash($password, PASSWORD_BCRYPT, $options);

            $sql = "INSERT INTO Usuario (nome, email, senha)
            VALUES ('$nome', '$email', '$hash')";
            $dbh->exec($sql);

        }else {
            echo "Email já cadastrado";
        }
    }

    public function altSenha($email, $password, $nPassword){
        $dbh = Conexao::getInstancia();

        if(self::verSenha($email, $password)){

            $options = ['cost' => 12,];
            $nHash = password_hash($nPassword, PASSWORD_BCRYPT, $options);
            $sql = "UPDATE Usuario SET senha='$nHash' WHERE email='$email'";
            $dbh->exec($sql);

            echo "Senha Alterada";
        }else {
            echo "Não foi possivel aterar a senha";
        }

    }

    public function recSenha($email){
        $dbh = Conexao::getInstancia();

        if(self::verUser($email)){
            $senha = uniqid(false);

            $sql = "UPDATE Usuario SET senha='$senha' WHERE email='$email'";
            $dbh->exec($sql);

            $passBank = $dbh->query("SELECT senha FROM Usuario WHERE email='$email'");
            $passBank = $passBank->fetch();

            if($senha == $passBank[0]){
                return TRUE;
            }else {
                return FALSE;
            }

        }else {
            echo "Não foi possivel recuperar a senha";
        }
    }

    public function remUser($email, $password){
        $dbh = Conexao::getInstancia();

        if(self::verSenha($email, $password) == TRUE){
            $sql = "DELETE FROM Usuario WHERE email = '$email'";
            $dbh->exec($sql);
            echo "Usuário excluido";
        }else {
            echo "Não foi possivel excluir usuário.";
        }
    }      
}

 $con = new User;    

// $con->verUser('');

// $con->cadUser("henryy", "henryguidelli@yahoo.co", "123");

// $con->remUser("henryguidelli@yahoo.co", "123");

// $con->altSenha('henryguidelli@yahoo.com', '456', '123');

// $con->recSenha('henryguidelli@yahoo.com');
