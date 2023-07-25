<?php

namespace App\Controllers;

class Laporan_Pembayaran_Gaji extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['karyawan'] = $this->db->query("SELECT * FROM tb_guru_staf WHERE pegawai='Honorer'")->getResult();
        $data['gaji'] = $this->db->query("SELECT * FROM tb_kas_keluar WHERE jenis='51110'")->getResult();

        return view('laporan_pembayaran_gaji/data', $data);
    }


    public function cetak($id = null)
    {
        $data['karyawan'] = $this->db->query("SELECT * FROM tb_guru_staf WHERE pegawai='Honorer'")->getResult();
        $data['gaji'] = $this->db->query("SELECT * FROM tb_kas_keluar WHERE id_kas_keluar='$id'")->getRow();
        $data['nominal'] = $data['gaji']->jumlah / count($data['karyawan']);

        return view('laporan_pembayaran_gaji/cetak', $data);
    }
}
