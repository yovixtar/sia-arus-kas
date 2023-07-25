<?php

namespace App\Controllers;

class Buku_Besar extends BaseController
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

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];
        $data['akun'] = $this->db->query("SELECT * FROM tb_akun  ORDER BY kode_akun ASC ")->getResult();

        return view('buku_besar/data', $data);
    }
    public function cetak()
    {
        $request = \Config\Services::request();



        $bulan = $request->uri->setSilent()->getSegment(2);
        $data['bulan'] =
            $bulan;

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];
        $data['akun'] = $this->db->query("SELECT * FROM tb_akun  ORDER BY kode_akun ASC ")->getResult();

        return view('buku_besar/cetak', $data);
    }
}
