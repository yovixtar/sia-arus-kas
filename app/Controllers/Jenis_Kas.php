<?php

namespace App\Controllers;

class Jenis_Kas extends BaseController
{
    public function index()
    {
        return view('jenis_kas/data');
    }
}