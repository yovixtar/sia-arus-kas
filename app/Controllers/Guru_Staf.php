<?php

namespace App\Controllers;

class Guru_staf extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $sesi = \Config\Services::session();

        $data['data'] = $this->db->table('tb_guru_staf')->get()->getResult();

        return view('guru_staf/data', $data);
    }

    public function tambah()
    {

        return view('guru_staf/form');
    }
    public function edit($id)
    {
        $data['data'] = $this->db->table('tb_guru_staf')->where('id_guru_staf', $id)->get()->getRow();

        return view('guru_staf/form', $data);
    }

    public function simpan()
    {
        # code...
        $id = @$_POST['id_guru_staf'];
        if (empty($id)) {

            $this->db->table('tb_guru_staf')->insert($_POST);
        } else {
            $this->db->table('tb_guru_staf')->where('id_guru_staf', $id)->update($_POST);
        }

        return redirect()->to(base_url('guru_staf?simpan=berhasil'));
    }

    public function hapus($id)
    {
        $this->db->table('tb_guru_staf')->where('id_guru_staf', $id)->delete();

        return redirect()->to(base_url('guru_staf?hapus=berhasil'));
    }
    public function status($id = null, $status = null)
    {

        if ($status == 'Ya') {
            $data['aktif'] = 'Tidak';
        } else {
            $data['aktif'] = 'Ya';
        }
        $this->db->table('tb_guru_staf')->where('id_guru_staf', $id)->update($data);

        return redirect()->to(base_url('guru_staf?status=berhasil'));
    }
}
