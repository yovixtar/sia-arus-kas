<?php

namespace App\Controllers;

class Laporan_neraca extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['modal_awal'] = $this->db->query("SELECT * FROM tb_akun WHERE kode_akun='31110'  ORDER BY kode_akun ASC")->getResult();
        $data['pemasukan'] = $this->db->query("SELECT * FROM tb_akun WHERE jenis_akun='aktiva'  ORDER BY kode_akun ASC")->getResult();
        $data['pengeluaran'] = $this->db->query("SELECT * FROM tb_akun WHERE jenis_akun='pasiva'  ORDER BY kode_akun ASC")->getResult();
        $request = \Config\Services::request();



        $bulan = $request->uri->setSilent()->getSegment(3);
        $data['bulan'] =
            $bulan;

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];
        return view('laporan_neraca/data', $data);
    }
    public function cetak()
    {
        $data['modal_awal'] = $this->db->query("SELECT * FROM tb_akun WHERE kode_akun='31110'  ORDER BY kode_akun ASC")->getResult();
        $data['pemasukan'] = $this->db->query("SELECT * FROM tb_akun WHERE jenis_akun='aktiva'  ORDER BY kode_akun ASC")->getResult();
        $data['pengeluaran'] = $this->db->query("SELECT * FROM tb_akun WHERE jenis_akun='pasiva'  ORDER BY kode_akun ASC")->getResult();
        $request = \Config\Services::request();



        $bulan = $request->uri->setSilent()->getSegment(2);
        $data['bulan'] =
            $bulan;

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];
        return view('laporan_neraca/cetak', $data);
    }
}
