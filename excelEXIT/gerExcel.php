<?php

session_start();
//chama a biblioteca...
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function relatorios($email){
    //cria uma nova tabela...
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('excels/modelos/RELATÓRIOS.xlsx');
    $worksheet = $spreadsheet->getActiveSheet('VENCIMENTO PRODUTOS');

    $styleCell = [
        'font' => [
            'bold' => true,
        ],
        'borders' => [
            'top' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ]
    ];


    //COMEÇA AQUI
    require_once('../modPHP/modExcel.php');
    require_once('../modPHP/modulos.php');



    getEstoque();

    $gettedRow = $_SESSION['gettedRow'];
    $bRow = $_SESSION['nRow'];
    $Row = 3;
    $nRow = $_SESSION['nRow'];
    $cRow = 0;

    print_r($gettedRow);

    $data = date('d/m/Y');

    $array = 0;
    while ($Row <= $bRow + 2) {

        $codItem = $gettedRow[$array]['codigo'];
        $nomeItem = $gettedRow[$array]['nome'];
        $uniItem = $gettedRow[$array]['unidade'];
        $valiItem = $gettedRow[$array]['validade'];
        $qtdItem = $gettedRow[$array]['quantidade'];
        $status = $gettedRow[$array]['status'];
        $peso = $gettedRow[$array]['peso'];

        $array++;
        $Row++;

        $worksheet->setCellValue("B$Row", "$codItem");
        $worksheet->setCellValue("C$Row", "$nomeItem");
        $worksheet->setCellValue("D$Row", "$uniItem");
        $worksheet->setCellValue("E$Row", "$qtdItem");
        $worksheet->setCellValue("H$Row", "$valiItem");
        $worksheet->setCellValue("G$Row", "$data");
        $worksheet->setCellValue("F$Row", "$peso");
        $worksheet->setCellValue("J$Row", "$status");

    }

    //escreve em disco o arquivo com os valores...
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('excels/estoque.xlsx');



    $sendMail = new sendMAIL;
    $sendMail->sendExcel($email);

    return TRUE;

}
$email = $_SESSION['user'];

$rel = relatorios($email);

if($rel == TRUE){
    header("location: ../rel.php");
}

?>