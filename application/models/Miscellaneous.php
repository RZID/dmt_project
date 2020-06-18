<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Miscellaneous extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function rupiahisasi($data)
    {
        $output = "Rp. " . number_format($data, 0, '', '.');
        return $output;
    }

    public function tanggalin($data)
    {
        $output = date("d-m-Y", $data);
        return $output;
    }

    function simplify($x)
    {
        $jml = strlen($x);
        $jml2 = $jml - 2;
        $a = substr($x, 2);
        $b = substr($x, 0, $jml2);
        if ($a >= 5) {
            $y = $b + 1;
            if ($y >= 10) {
                $y = 9;
            }
        } else {
            $y = $b;
        }
        return $y;
    }
}
