<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


include_once('bdConnect.php');

function sendMail($email, $senha, $nome){

    $mail = new PHPMailer(true);

            try {

                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                //$mail->Name = 'Henry Guidelli';
                $mail->Username = 'contato.henryguidelli@gmail.com';
                $mail->Password = 'sgtenkbljszckrkh';
                $mail->Port = 465;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

                $mail->setFrom('contato.henryguidelli@gmail.com');
                $mail->addAddress($email);

                //$mail->addAttachment($file);
                //$mail->addAttachment('files/murilo.jpg');

                $mail->isHTML(true);
                $mail->Subject = $nome ;
                $mail->Body = $senha;

                

                // if($mail->send()) {
                //    // echo '<h1>Seu email foi enviado!</h1>';
                // } else {
                //    // echo '<h1>Email FALHOU!</h1>';
                // }


            }   
            catch (Exception $e) {
                    echo "Erro ao enviar a mensagem: {$mail->ErrorInfor}";
            }
}

function sendExcel($email){

  $mail = new PHPMailer(true);

          try {

              //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              //$mail->Name = 'Henry Guidelli';
              $mail->Username = 'contato.henryguidelli@gmail.com';
              $mail->Password = 'sgtenkbljszckrkh';
              $mail->Port = 465;
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

              $mail->setFrom('contato.henryguidelli@gmail.com');
              $mail->addAddress($email);


              $mail->addAttachment("../../excelEXIT/TESTES/excels/teste01.xlsx");

              $mail->isHTML(true);
              $mail->Subject = $email ;
              $mail->Body = "teste";

              $goTO = $goTO['estoque'];

              

              if($mail->send()) {
                  echo "<meta http-equiv='refresh' content='0;url=../../$goTO'>";
              } else {
                  echo '<h1>Email FALHOU!</h1>';
              }


          }   
          catch (Exception $e) {
                  echo "Erro ao enviar a mensagem: {$mail->ErrorInfor}";
          }
}

function verifyEmail($email){

  $objeto = new Conexao;
  $dbh = $objeto->conectar();

  $cmd = $dbh->prepare("SELECT email FROM Usuario WHERE email='$email'");
  $cmd->execute();
  $resultado = $cmd->fetch();

print_r($resultado['email']);

      if($resultado['email'] == $email){
       return TRUE;
      }else{
        return FALSE;
      }


}

function verifyUser($email, $senha){

  $objeto = new Conexao;
  $dbh = $objeto->conectar();

        if(verifyEmail($email) == TRUE){

          $pasWord = $dbh->prepare("SELECT senha FROM Usuario WHERE email='$email'");
          $pasWord->execute();
          $senhaVerify = $pasWord->fetch();
        }

     $hash = $senhaVerify[0];

      if(strlen($hash) != 13){

          if (password_verify($senha, $hash)) {
              echo "<br>PASSWORD IS VALID";
              return TRUE;
          }else {
              echo "<br>PASSWORD IS INVALID";
              return FALSE;
          }

      }else {
          if ($senha = $hash) {
              echo "<br>PASSWORD IS VALID";
              return TRUE;
          }else {
              echo "<br>PASSWORD IS INVALID";
              return FALSE;
          }
      }

  

}


function cadUser($nome, $email, $senha){

  $objeto = new Conexao;
  $dbh = $objeto->conectar();

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

 

  $options = [
    'cost' => 12,
  ];

  $hash = password_hash($senha, PASSWORD_BCRYPT, $options);

      if(verifyEmail($email) == FALSE){

        $sql = "INSERT INTO Usuario (nome, email, senha, celular)
        VALUES ('$nome', '$email', '$hash', '1234567890')";
        $dbh->exec($sql); 

        sendMail($email, $senha, $nome);

        return TRUE;

      }else {
        return FALSE;
      }

}


function alterarSenha($email, $novaSenha, $senha){

  $objeto = new Conexao;
  $dbh = $objeto->conectar();

        $options = [
          'cost' => 12,
      ];

        $hash = password_hash($novaSenha, PASSWORD_BCRYPT, $options);
    
        $novaSenha = '';


          if(verifyUser($email, $senha) == TRUE){
            $sql = "UPDATE usuario SET senha='$hash' Where email='$email'";
            $dbh->exec($sql);
          }else{
            echo "ERRO";
          }

}

function recuperarSenha($email){

  

        $rand = uniqid(false);

        $senhaProv = $rand;

        $senha = $senhaProv;

        $nome = "SIDE: RECUPERAR SENHA TESTE";
        
        $objeto = new Conexao;
        $dbh = $objeto->conectar();

        try {
          


            $sql = "UPDATE Usuario SET senha='$senha' Where email='$email'";
            $dbh->exec($sql);  

            $cmd = $dbh->prepare("SELECT email FROM usuario WHERE email='$email'");
            $cmd->execute();
            $resultado = $cmd->fetch();

            $userName = $dbh->prepare("SELECT senha FROM usuario WHERE email='$email'");
            $userName->execute();
            $nome1 = $userName->fetch();

            sendMail($email, $senha, $nome);

            if($nome1[0] == $senha){
              return TRUE;
            }else{
              return FALSE;
            }

            
            print_r($resultado[0]);
            print_r($nome1[0]);

            echo $senhaProv;

            

            //echo "New record created successfully";
          } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            echo 'Connection failed: ' . $e->getMessage();
          }

          

}


function addItem($nomeProd, $uni){

  $objeto = new Conexao;
  $dbh = $objeto->conectar();
  
      try {

  
          $sql = "INSERT INTO Produto (nome, unidade)
              VALUES ('$nomeProd', '$uni')";
          $dbh->exec($sql); 
  
          $cmd = $dbh->prepare("SELECT nome FROM Produto WHERE nome='$nomeProd'");
          $cmd->execute();
          $resultado = $cmd->fetch();

          echo "<h1><br>$resultado[0] cadastrada!<br></h1>";
  
          //echo "New record created successfully";
        } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
        }
       $dbh = null;

}



function pesquItem(){

  $objeto = new Conexao;
  $dbh = $objeto->conectar();


 /*fecha a tabela apos termino de impressão das linhas*/

  
      try {
          $cmd = $dbh->prepare("SELECT*FROM Produto;");
          $cmd->execute();
          $resultado = $cmd;

          
        
          echo "<table><tr><td>ID</td><td>Nome</td><td>Unidade</td></tr>";

          /*Enquanto houver dados na tabela para serem mostrados será executado tudo que esta dentro do while */
          while($row = $resultado->fetch()){
          
          /*Escreve cada linha da tabela*/
          echo "<tr><td>" . $row['codigo']  . $row['nome'] . "</td><td>" . $row['unidade'] . "</td></tr>";
          
          } /*Fim do while*/
          
          echo "</table>";

        } catch (PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
        }

}