<?php

namespace App\Controllers;

class Kas_masuk extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['data'] = $this->db->table('tb_kas_masuk')->get()->getResult();

        return view('kas_masuk/data', $data);
    }

    public function tambah()
    {
        $next = $this->db->query("SELECT `auto_increment` as id FROM INFORMATION_SCHEMA.TABLES
WHERE table_name = 'tb_kas_masuk'")->getRow();



        $no_transaksi = str_pad($next->id, 2, '0', STR_PAD_LEFT) . '/KM/' . date('m/Y');

        $data['data'] = (object) ['no_transaksi' => $no_transaksi, 'tanggal' => date('Y-m-d')];

        return view('kas_masuk/form', $data);
    }
    public function edit($id)
    {
        $data['data'] = $this->db->table('tb_kas_masuk')->where('id_kas_masuk', $id)->get()->getRow();

        return view('kas_masuk/form', $data);
    }

    public function simpan()
    {
        # code...


        $id = @$_POST['id_kas_masuk'];
        if (empty($id)) {
            // print_r($_POST);
            // die();
            $this->db->table('tb_kas_masuk')->insert($_POST);
            $last_id = $this->db->insertID();
            $jurnal_header = array(
                'id_transaksi' =>  $last_id,
                'tanggal' => $_POST['tanggal'],
                'keterangan' => 'Kas Masuk ' . $_POST['sumber']
            );

            $this->db->table('tb_jurnal_header')->insert($jurnal_header);

            $last_id_jurnal = $this->db->insertID();

            if ($_POST['sumber'] == 'BOS') {
                $this->simpan_jurnal_detail($last_id_jurnal, '11110', $_POST['jumlah'], 0);
                $this->simpan_jurnal_detail($last_id_jurnal, '31110', 0, $_POST['jumlah']);
            } else if ($_POST['sumber'] == 'Penjualan Seragam') {
                $this->simpan_jurnal_detail($last_id_jurnal, '11110', $_POST['jumlah'], 0);
                $this->simpan_jurnal_detail($last_id_jurnal, '41110', 0, $_POST['jumlah']);
            } else {
                $this->simpan_jurnal_detail($last_id_jurnal, '11120', $_POST['jumlah'], 0);
                $this->simpan_jurnal_detail($last_id_jurnal, '41110', 0, $_POST['jumlah']);
            }
        } else {
            $this->db->table('tb_kas_masuk')->where('id_kas_masuk', $id)->update($_POST);
        }

        return redirect()->to(base_url('kas_masuk?simpan=berhasil'));
    }

    public function hapus($id)
    {
        $this->db->table('tb_kas_masuk')->where('id_kas_masuk', $id)->delete();

        return redirect()->to(base_url('kas_masuk'));
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
