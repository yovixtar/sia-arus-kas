<?php

namespace App\Controllers;

use Config\Services;

class Login extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = Services::session();
    }
    public function index()
    {
        return view('login');
    }
    public function proses()
    {
        // Get the submitted username and password from the form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        // Validate the user credentials
        $db = \Config\Database::connect();

        $get_data = $db->query("SELECT * FROM tb_guru_staf WHERE username='$username' AND password='$password'")->getRow();


        if (!empty($get_data)) {
            // Successful login, store user data in session or perform any other actions

            if ($get_data->aktif != 'Ya') {
                return redirect()->to(base_url('login?pesan=nonaktif'));
            } else {
                $this->session->set('logged', true);
                $this->session->set('data', $get_data);
                return redirect()->to('/dashboard');
            }
        } else {
            // Invalid credentials, display error message
            return redirect()->to(base_url('login?msg=Username atau Password Salah'));
        }
    }

    public function logout()
    {
        // Clear the user session or perform any other actions
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
