<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export_excel extends CI_Model
{
    function head_of_excel($access)
    {
        $head["tanggal_sekarang"] = date("H:i:s d/m/Y", time());
        switch ($access) {
            case 1:
                $head["cheer"] = "Ekspor Data PND";
                break;
            case 2:
                $head["cheer"] = "Ekspor Data PND";
                break;
            case 3:
                $head["cheer"] = "Ekspor Data Instruktur";
                break;
            case 4:
                $head["cheer"] = "Ekspor Data Operation";
                break;
            case 5:
                $head["cheer"] = "Ekspor Data Keuangan";
                break;
        }
        return $head;
    }
    function export_pnd()
    {
        $gethead = $this->head_of_excel($this->session->userdata("access_num"));
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);

        $filename = date("H:i d/m/Y") . 'PND -' . $this->session->userdata("nama");

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
