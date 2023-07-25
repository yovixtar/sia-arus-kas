<?php

namespace App\Controllers;

class Laporan_Pembayaran_Gaji extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index($bulan = '', $cetak = '')
    {
        $cetak = filter_var($cetak, FILTER_VALIDATE_BOOLEAN);
        
        $request = \Config\Services::request();
        $bulan = $request->uri->setSilent()->getSegment(3);
        $data['bulan'] =
            $bulan;

        $data['bulane'] = explode('-', $bulan)[1];
        $data['tahune'] = explode('-', $bulan)[0];

        $data['gaji'] = $this->db->query("SELECT * FROM tb_kas_keluar WHERE jenis='51110' AND MONTH(tanggal) = " . $data['bulane'] . " AND YEAR(tanggal) = " . $data['tahune'])->getResult();

        if ($cetak) {
            return view('laporan_pembayaran_gaji/cetak', $data);
        } else {
            return view('laporan_pembayaran_gaji/data', $data);
        }
    }

}
