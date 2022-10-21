<?php

session_start();
//chama a biblioteca...
require 'vendor/autoload.php';



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function excelValidade($email){
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
    while ($Row <= $bRow+2) {

        $codItem = $gettedRow[$array]['codigo'];
        $nomeItem = $gettedRow[$array]['nome'];
        $uniItem = $gettedRow[$array]['unidade'];

        $array++;
        $Row++;

        $worksheet->setCellValue("B$Row", "$codItem");
        $worksheet->setCellValue("C$Row", "$nomeItem");
        $worksheet->setCellValue("D$Row", "$uniItem");

    }

    //escreve em disco o arquivo com os valores...
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('excels/teste01.xlsx');

    sendExcel($email);



}

$email = $_SESSION['user'];
excelValidade($email);

 echo "<meta http-equiv='refresh' content='0;url=../cadItem.php'>";
?>