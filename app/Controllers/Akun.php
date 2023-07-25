<?php

namespace App\Controllers;

class Akun extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['data'] = $this->db->query("SELECT * FROM tb_akun ORDER BY kode_akun ASC")->getResult();

        return view('akun/data', $data);
    }

    public function tambah()
    {

        return view('akun/form');
    }
    public function edit($id)
    {
        $data['data'] = $this->db->table('tb_akun')->where('id_akun', $id)->get()->getRow();

        return view('akun/form', $data);
    }

    public function simpan()
    {
        # code...
        $id = @$_POST['id_akun'];
        if (empty($id)) {

            $this->db->table('tb_akun')->insert($_POST);
        } else {
            $this->db->table('tb_akun')->where('id_akun', $id)->update($_POST);
        }

        return redirect()->to(base_url('akun?simpan=berhasil'));
    }

    public function hapus($id)
    {
        $this->db->table('tb_akun')->where('id_akun', $id)->delete();

        return redirect()->to(base_url('akun?hapus=berhasil'));
    }
}
