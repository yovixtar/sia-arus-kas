<?php

namespace App\Controllers;

class Kas_keluar extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['data'] = $this->db->table('tb_kas_keluar')->get()->getResult();

        return view('kas_keluar/data', $data);
    }

    public function tambah()
    {
        $next = $this->db->query("SELECT `auto_increment` as id FROM INFORMATION_SCHEMA.TABLES
WHERE table_name = 'tb_kas_keluar'")->getRow();



        $no_transaksi = str_pad($next->id, 2, '0', STR_PAD_LEFT) . '/KK/' . date('m/Y');

        $data['data'] = (object) ['no_transaksi' => $no_transaksi, 'tanggal' => date('Y-m-d')];
        $data['akun_biaya'] = $this->db->table('tb_akun')->where('jenis_akun', 'pasiva')->get()->getResult();
        return view('kas_keluar/form', $data);
    }
    public function edit($id)
    {
        $data['data'] = $this->db->table('tb_kas_keluar')->where('id_kas_keluar', $id)->get()->getRow();
        $data['akun_biaya'] = $this->db->table('tb_akun')->where('jenis_akun', 'pasiva')->get()->getResult();

        return view('kas_keluar/form', $data);
    }

    public function simpan()
    {
        # code...
        $id = @$_POST['id_kas_keluar'];
        if (empty($id)) {

            // print_r($_POST);
            // die();
            $this->db->table('tb_kas_keluar')->insert($_POST);
            $last_id = $this->db->insertID();

            $jurnal_header = array(
                'id_transaksi' =>  $last_id,
                'tanggal' => $_POST['tanggal'],
                'keterangan' => 'Kas Keluar ' . $_POST['keterangan']
            );
            $this->db->table('tb_jurnal_header')->insert($jurnal_header);
            $last_id_jurnal = $this->db->insertID();

            $this->simpan_jurnal_detail($last_id_jurnal, '11110', 0, $_POST['jumlah']);
            $this->simpan_jurnal_detail($last_id_jurnal, $_POST['jenis'], $_POST['jumlah'], 0);
        } else {
            $this->db->table('tb_kas_keluar')->where('id_kas_keluar', $id)->update($_POST);
        }

        return redirect()->to(base_url('kas_keluar?simpan=berhasil'));
    }

    public function hapus($id)
    {
        $this->db->table('tb_kas_keluar')->where('id_kas_keluar', $id)->delete();

        return redirect()->to(base_url('kas_keluar'));
    }
    public function simpan_jurnal_detail($id_jurnal, $kode_akun, $debit, $kredit)
    {
        $jurnal_detail = array(
            'id_jurnal' => $id_jurnal,
            'kode_akun' => $kode_akun,
            'debit' => $debit,
            'kredit' => $kredit,
        );
        $this->db->table('tb_jurnal_detail')->insert($jurnal_detail);
    }
}
