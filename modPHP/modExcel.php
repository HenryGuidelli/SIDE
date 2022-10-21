<?php 

include_once('bdConnect.php');

function getEstoque(){

    $objeto = new Conexao;
    $dbh = $objeto->conectar();

    $cmd = $dbh->prepare("SELECT*FROM Produto");
    $cmd->execute();
    $resultado = $cmd;
    
    $row = $resultado->fetchAll();

    $nRow = intval(count($row));

    for ($i=0; $i < $nRow; $i++) { 

        $gettedRow = [

        $i => $row[$i] = [
        
        'codigo' => $row[$i][0],
        'nome' => $row[$i][1],
        'unidade' => $row[$i][2]

        ],

        ];

        if($nRow < $i){
        break;
        }

        //Mostra os resultados do array com todas as linhas da tabela
        // sprint_r($gettedRow);
        // echo "<br>"; 

        $gettedRow = $gettedRow[$i];
        $_SESSION['nRow'] = $nRow;
        $_SESSION['gettedRow'][] = $gettedRow;

    }

}


?>