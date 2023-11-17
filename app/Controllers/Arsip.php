<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\kategoriModel;

class Arsip extends BaseController
{
    private $ArsipModel;
    private $KategoriModel;

    public function __construct()
    {
        $this->ArsipModel = new ArsipModel();
        $this->KategoriModel = new kategoriModel();
        helper('form');
    }

    public function index(): string
    {
        $data = array(
            'data' => $this->ArsipModel->getalldata(),
            'title' => 'Arsip',
            'isi' => 'v_arsip'
        );
        return view('layout/v_wrapper', $data);
    }

    public function tambah(): string
    {
        $data = array(
            'kategori' => $this->KategoriModel->getalldata(),
            'title' => 'Unggah Arsip',
            'isi' => 'v_unggaharsip'
        );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        $arsipModel = new \App\Models\ArsipModel();
        $kategoriModel = new \App\Models\KategoriModel();

        $validationRules = [
            'file' =>
            'uploaded[file]',
            'mime_in[file,application/pdf]',
            'max_size[file,5000]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('arsip/tambah'));
            echo "PDF?";
        } else {
            $file = $this->request->getFile('file');
            $sanitizedNomorSurat = preg_replace('/[^a-zA-Z0-9_\-]/', '', $this->request->getPost('nomorsurat'));
            $newFileName = $sanitizedNomorSurat . '.' . $file->getExtension();
            $file->move(ROOTPATH . 'public/uploads', $newFileName); // Assuming you have an 'uploads' folder in your public directory
        }

        $data = [
            'nomorsurat' => $this->request->getPost('nomorsurat'),
            'idkategori' => $this->request->getPost('kategori'),
            'judul' => $this->request->getPost('judul'),
            'waktuarsip' => date('Y-m-d H:i:s'),
            'file' => $newFileName,
        ];

        $arsipModel->insert($data);

        return redirect()->to(base_url('arsip'));
    }

    public function hapus()
    {
        $arsipModel = new \App\Models\ArsipModel();
        $nomorsurat = $this->request->getPost('nomorsurat');
        $sanitizedNomorSurat = preg_replace('/[^a-zA-Z0-9_\-]/', '', $this->request->getPost('nomorsurat'));
        $arsip = $arsipModel->find($nomorsurat);

        if ($arsip) {
            $arsipModel->delete($nomorsurat);
            $imagePath = 'public/uploads/' . $sanitizedNomorSurat . '.pdf';
            unlink(ROOTPATH . $imagePath);
        }
        return redirect()->back();
    }

    public function lihat($id)
    {
        $arsip = $this->ArsipModel->findID($id);

        $data = array(
            'title' => 'Lihat Dokumen Pendaftar',
            'arsip' => $arsip,
            'isi' => 'v_lihatarsip'
        );
        return view('layout/v_wrapper', $data);
    }
}
