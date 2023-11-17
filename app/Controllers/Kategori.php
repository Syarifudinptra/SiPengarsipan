<?php

namespace App\Controllers;

use App\Models\kategoriModel;
use App\Controllers\BaseController;

class Kategori extends BaseController
{
    private $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new kategoriModel();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Kategori',
            'datakategori' => $this->kategoriModel->getalldata(),
            'isi' => 'v_kategori'
        );
        return view('layout/v_wrapper', $data);
    }
    public function formtambah()
    {
        $NextID = $this->kategoriModel->getNextId();
        $datamodel = new kategoriModel();
        $data = array(
            'title' => 'Tambah kategori',
            'NextID' => $NextID,
            'datakategori' => $datamodel->all_data(),
            'isi' => 'v_tambahkategori'
        );
        // print_r($data["dokumensiswa"]);
        return view('layout/v_wrapper', $data);
    }
    public function storeAll()
    {
        $model = new kategoriModel();

        $id = $this->request->getPost('id_kategori');

        $existingRecord = $model->where('idkategori', $id)->first();
        if ($existingRecord) {
            session()->setFlashdata('gagal', 'ID tersebut sudah memiliki data kategori');
            return redirect()->to(previous_url())->withInput();
        }

        $validationRules = [
            'id_kategori' => 'required|numeric',
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('gagal', 'Terjadi kesalahan input, coba lagi');
            return redirect()->to(base_url('kategori/index'));
        }

        $data = [
            'idkategori' => $this->request->getPost('id_kategori'),
            'namakategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($model->insert($data)) {

            for ($inc = 1; $inc <= 5; $inc++) {
                $data = [
                    'idkategori' => $this->request->getPost('id_kategori'),
                    'namakategori' => $this->request->getPost('nama_kategori'),
                    'keterangan' => $this->request->getPost('keterangan') . "_additional_$inc",
                ];
            }

            session()->setFlashdata('sukses', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('gagal', 'Gagal menambahkan data');
        }

        return redirect()->to(base_url('kategori/index'));
    }
    public function edit()
    {
        $model = new kategoriModel();

        $idkategori = $this->request->getPost('id_kategori');

        $data = $model->find($idkategori);

        $array_ret = array(
            'title' => 'Edit Data Kategori',
            'datakategori' => $data,
            'isi' => 'v_editkategori'
        );

        return view('layout/v_wrapper', $array_ret);
        // return view('admin/editDataSiswa', $data);
    }

    public function update()
    {
        $model = new kategoriModel();

        // Ambil data dari form
        $id = $this->request->getPost('id_kategori');
        $nama_kategori = $this->request->getPost('nama_kategori');
        $keterangan = $this->request->getPost('keterangan');

        // Validasi data
        $validationRules = [
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('kategori/edit/' . $id))->withInput()->with('validation', $this->validator);
        }

        // Update data
        $data = [
            'nama_kategori' => $nama_kategori,
            'keterangan' => $keterangan,
        ];

        $model->update($id, $data);

        return redirect()->to(base_url('kategori/index'))->with('success', 'Data berhasil diupdate');
    }
    public function hapus()
    {
        $model = new kategoriModel();

        $idkategori = $this->request->getPost('id_kategori');

        $siswa = $model->find($idkategori);
        if ($siswa) {
            $model->delete($idkategori);
            $model = new kategoriModel();
            session()->setFlashdata('sukseshapus', 'Data siswa berhasil dihapus.');
        } else {
            session()->setFlashdata('gagalhapus', 'Data siswa tidak ditemukan.');
        }

        return redirect()->to(base_url('kategori/index'));
    }
}
