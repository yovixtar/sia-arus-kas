<?php

namespace App\Controllers;

class Neraca_Saldo extends BaseController
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
        $data['neraca'] = $this->db->query("SELECT * FROM tb_akun ORDER BY kode_akun ASC")->getResult();

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];
        $data['akun'] = $this->db->query("SELECT * FROM tb_akun ORDER BY kode_akun ASC")->getResult();
        return view('neraca_saldo/data', $data);
    }
    public function cetak()
    {

        $request = \Config\Services::request();

        $bulan = $request->uri->setSilent()->getSegment(2);
        $data['bulan'] =
            $bulan;
        $data['neraca'] = $this->db->query("SELECT * FROM tb_akun ORDER BY kode_akun ASC")->getResult();

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];
        $data['akun'] = $this->db->query("SELECT * FROM tb_akun ORDER BY kode_akun ASC")->getResult();
        return view('neraca_saldo/cetak', $data);
    }
}
