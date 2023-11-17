<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class About extends BaseController
{
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Profil',
    //         'nama' => 'John Doe',
    //         'alamat' => 'Jl. Contoh No. 123',
    //         'telepon' => '081234567890',
    //         'email' => 'john.doe@example.com',
    //         // tambahkan informasi profil lainnya
    //     ];

    //     return view('v_about', $data);
    // }
    public function index()
    {
        $data = array(
            'title' => 'About',
            'isi' => 'v_about'
        );
        return view('layout/v_wrapper', $data);
    }
}