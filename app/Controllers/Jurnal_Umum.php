<?php

namespace App\Controllers;

class Jurnal_Umum extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {

        $request = \Config\Services::request();



        $bulan = $request->uri->setSilent()->getSegment(3);
        $data['bulan'] =
            $bulan;

        $bulane = explode('-', $bulan)[1];
        $tahune = explode('-', $bulan)[0];

        $data['jurnal_umum'] = $this->db->query("SELECT * FROM tb_jurnal_header WHERE MONTH(tanggal)='$bulane' AND YEAR(tanggal)='$tahune'")->getResult();

        return view('jurnal_umum/data', $data);
    }
    public function cetak()
    {

        $request = \Config\Services::request();


        $bulan = $request->uri->setSilent()->getSegment(2);
        $data['bulan'] =
            $bulan;

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];

        $data['jurnal_umum'] = $this->db->query("SELECT * FROM tb_jurnal_header WHERE MONTH(tanggal)='" .  $data['bulane'] . "' AND YEAR(tanggal)='" . $data['tahune'] . "'")->getResult();

        return view('jurnal_umum/cetak', $data);
    }
}
