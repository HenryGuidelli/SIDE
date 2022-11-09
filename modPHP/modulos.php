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
    $mail->Username = 'sidetcc@gmail.com';
    $mail->Password = 'iemtpjwwgnejxfhv';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    $mail->setFrom('contato.henryguidelli@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = $nome;
    $mail->Body = $senha;



    if ($mail->send()) {
      echo '<h1>Seu email foi enviado!</h1>';
    } else {
      echo '<h1>Email FALHOU!</h1>';
    }


  } catch (Exception $e) {
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
    $mail->Username = 'sidetcc@gmail.com';
    $mail->Password = 'iemtpjwwgnejxfhv';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    $mail->setFrom('contato.henryguidelli@gmail.com');
    $mail->addAddress($email);


    $mail->addAttachment("../excelEXIT/excels/teste01.xlsx");

    $mail->isHTML(true);
    $mail->Subject = $email;
    $mail->Body = "teste";

    // $goTO = $goTO['estoque'];



    if ($mail->send()) {
      echo '<h1>EMAIL ENVIADO!</h1>';
    } else {
      echo '<h1>Email FALHOU!</h1>';
    }


  } catch (Exception $e) {
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

  if ($resultado['email'] == $email) {
    return TRUE;
  } else {
    return FALSE;
  }


}

function verifyUser($email, $senha){

  $objeto = new Conexao;
  $dbh = $objeto->conectar();

  if (verifyEmail($email) == TRUE) {

    $pasWord = $dbh->prepare("SELECT senha FROM Usuario WHERE email='$email'");
    $pasWord->execute();
    $senhaVerify = $pasWord->fetch();
  }

  $hash = $senhaVerify[0];

  if (strlen($hash) != 13) {

    if (password_verify($senha, $hash)) {
      echo "<br>PASSWORD IS VALID";
      return TRUE;
    } else {
      echo "<br>PASSWORD IS INVALID";
      return FALSE;
    }

  } else {
    if ($senha = $hash) {
      echo "<br>PASSWORD IS VALID";
      return TRUE;
    } else {
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

  if (verifyEmail($email) == FALSE) {

    $sql = "INSERT INTO Usuario (nome, email, senha)
        VALUES ('$nome', '$email', '$hash')";
    $dbh->exec($sql);

    sendMail($email, $senha, $nome);

    sleep(5);

    return TRUE;

  } else {
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


  if (verifyUser($email, $senha) == TRUE) {
    $sql = "UPDATE usuario SET senha='$hash' Where email='$email'";
    $dbh->exec($sql);
  } else {
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

    if ($nome1[0] == $senha) {
      return TRUE;
    } else {
      return FALSE;
    }


    // print_r($resultado[0]);
    // print_r($nome1[0]);

    // echo $senhaProv;


    //echo "New record created successfully";
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    echo 'Connection failed: ' . $e->getMessage();
  }



}



class Estoque{

  public function listEstoque(){

    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $lista = array();

    $cmd = $dbh->query("SELECT*FROM Alimento ORDER BY nome;");
    $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

    if (count($lista) > 0) {
      for ($i = 0; $i < count($lista); $i++) {

        $codAli = $lista[$i]['codAli'];
        echo "<tr>";

        foreach ($lista[$i] as $C => $L) {

          if ($C != "codAli") {

            echo "<td>" . $L . "</td>";

          }
        }

        echo "<td><a href='estoque.php?codA=$codAli'>EDITAR</a> <a href='estoque.php?codAli=$codAli'>EXCLUIR</a></td>";
        echo "</tr>";

      }
      echo "</table>";

    } else {
      echo "<h3>O ESTOQUE ESTÁ VAZIO</h3>";
    }
  }

  public function addEstoque($idProd, $venci, $qtd, $peso){
    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $prod = array();

    $cmd = $dbh->query("SELECT nome, unidade FROM produto WHERE codigo = '$idProd';");
    $prod = $cmd->fetch(PDO::FETCH_ASSOC);
    $prodNome = $prod['nome'];
    $prodUni = $prod['unidade'];


    if ($prod != NULL) {

      $res = array();

      $aliN = $dbh->query("SELECT nome FROM Alimento WHERE nome = '$prodNome';");
      $res = $aliN->fetch();

      if (!$res) {

        $pesoM = $qtd * $peso;
        // var_dump($pesoM);

        $sql = "INSERT INTO Alimento (nome, unidade, peso, validade, quantidade)
            VALUES ('$prodNome', '$prodUni', '$pesoM', '$venci', '$qtd')";
        $dbh->exec($sql);
        return TRUE;

      } else {

        echo "<h3>ITEM NO ESTOQUE</h3>";
        return FALSE;
      }

    }

  }

  public function upEstoque($codAli){
    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $pgm = $dbh->query("SELECT quantidade, peso FROM Alimento WHERE codAli = '$codAli';");
    $list = $pgm->fetch(PDO::FETCH_ASSOC);
    $qtd = $list['quantidade'];
    $peso = $list['peso'];

    $qtdM = $qtd - 1;
    $pesoD = $peso/$qtd;
    $pesoN =  $qtdM * $pesoD;

    $cmd = "UPDATE Alimento SET quantidade='$qtdM', peso='$pesoN' WHERE codAli = '$codAli'";
    $dbh->exec($cmd);
  }

  public function delEstoque($codAli){
    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $cmd = $dbh->prepare("DELETE FROM Alimento WHERE codAli = '$codAli'");
    $cmd->execute();
  }

}

class Produto{

  public function listProd()
  {

    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $lista = array();

    $cmd = $dbh->query("SELECT*FROM Produto ORDER BY nome;");
    $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

    if (count($lista) > 0) {
      for ($i = 0; $i < count($lista); $i++) {

        $cod = $lista[$i]['codigo'];
        echo "<tr>";

        foreach ($lista[$i] as $C => $L) {

          if ($C != "codigo") {

            echo "<td>" . $L . "</td>";

          }
        }

        echo "<td><a href=''>EDITAR</a> <a href='cadItem.php?cod=$cod'>EXCLUIR</a></td>";
        echo "</tr>";

      }
      echo "</table>";

    } else {
      echo "<h3>O ESTOQUE ESTÁ VAZIO</h3>";
    }
  }

  public function addProd($Produto, $uni)
  {
    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $prod = array();

    $cmd = $dbh->query("SELECT nome FROM produto WHERE nome = '$Produto';");
    $prod = $cmd->fetch(PDO::FETCH_ASSOC);

    if (empty($prod['nome'])) {

      $sql = "INSERT INTO produto (nome, unidade)
            VALUES ('$Produto', '$uni')";
      $dbh->exec($sql);
      return TRUE;

    } else {

      echo "<h3>ITEM NO ESTOQUE</h3>";
      return FALSE;
    }



  }

  public function delProd($cod)
  {
    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $cmd = $dbh->prepare("DELETE FROM Produto WHERE codigo = '$cod'");
    $cmd->execute();
  }

}



function prodAlim(){
  $objeto = new Conexao;
  $dbh = $objeto->conectar();
  try {

    $cmd = $dbh->query("SELECT codigo, nome FROM Produto;");


    while ($prod = $cmd->fetch()) {
      echo "<option value='" . $prod['codigo'] . "'> " . $prod['nome'] . " </option>";
    }
    ;

  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
  $dbh = null;
}