<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = array(
            'title' => 'Home',
            'isi' => 'v_arsip'
    );
        return view('layout/v_wrapper',$data);
    }
}
